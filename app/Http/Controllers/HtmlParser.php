<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DOMDocument;

class HtmlParser extends Controller
{
    public function showHtmlTree(Request $request)
    {

        $htmlUrl = $request->get('htmltree', 'https://getbootstrap.com/');

        // Fetch HTML content using Guzzle
        $client = new Client();
        $response = $client->get($htmlUrl);
        $htmlContent = $response->getBody()->getContents();

        // Parse the HTML content
        $dom = new DOMDocument();
        @$dom->loadHTML($htmlContent); // Use '@' to suppress warnings


        // Create a tree structure
        $tree = $this->createTree($dom->documentElement);


        return view('html-tree', compact('tree'));
    }

    public function createTree($element)
    {

        $tree = '<li>' . $element->nodeName;
        $children = $element->childNodes;

        if ($children->length > 0) {
            $tree .= '<ul class="nested">';
            foreach ($children as $child) {
                if ($child->nodeType === XML_ELEMENT_NODE) {
                    $tree .= $this->createTree($child);
                }
            }
            $tree .= '</ul>';
        }

        $tree .= '</li>';

        return $tree;
    }
}
