<?php

namespace Statamic\Addons\Inquiry;

use Statamic\Extend\Controller;
use Statamic\API\Entry;

class InquiryController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function postProcess()
    {
        $date = \Carbon\Carbon::now()->toTimeString();

        $name = request()->get('name', 'CeibaFriend');

        $title = slugify($name) . '_' . $date;

        $choice = implode(', ', request()->get('selectedChoices', ['No Choice']));

        $comment = request()->get('comment', 'No Comment');

        $contact = request()->get('contact', 'No Contact');

        $entry = Entry::create($title)
            ->collection('inquiries')
            ->date()
            ->with(compact('title', 'name', 'choice', 'comment', 'contact'))
            ->get()
            ->save();

        return json_encode($entry);
    }
}
