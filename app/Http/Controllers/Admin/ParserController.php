<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Resource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $resources = Resource::all();

        foreach ($resources as $resource) {
            $xml = simplexml_load_file($resource->url);

            foreach ($xml->channel->item as $item) {
                $post = (array) $item;
                $post = array_map('strval', $post);

                $content = (string) $item->children('content', true)->encoded;

                if (!$content) {
                    $content = $post['description'];
                    $post['description'] = null;
                }

                $imageUrl = (string) $item->children('media', true)->attributes()?->url;

                if (!$imageUrl) {
                    $imageUrl = $post['image'] ?? null;
                }

                $author = (string) $item->children('dc', true)->creator;

                if (!$author) {
                    $author = 'Unknown';
                }

                $post['content'] = $content;
                $post['image_url'] = $imageUrl;
                $post['author'] = $author;
                $post['category_id'] = $resource->category->id;

                News::firstOrCreate([
                    'title' => $post['title'],
                    'description' => $post['description'],
                    'content' => $post['content'],
                    'image_url' => $post['image_url'],
                    'category_id' => $post['category_id'],
                    'status' => Status::ACTIVE->value,
                    'author' => $post['author']
                ]);
            }
        }

        return redirect(route('admin.news.index'));
    }
}
