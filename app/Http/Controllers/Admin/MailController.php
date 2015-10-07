<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;

class MailController extends Controller
{
    public function index()
    {
        $user = \Auth::getUser();

        $mailbox = new ImapMailbox('{mail.premium-minds.com:993/imap/ssl}INBOX',$user->email_username,$user->email_password);

        $mailsIds = $mailbox->searchMailbox('');
        if (!$mailsIds) {
            die('Mailbox is empty');
        }

        $mails = array();
        foreach ($mailsIds as $mailId)
        {
            $mails[] = $mailbox->getMail($mailId);
        }

        $viewData['mails'] = $mails;
        return view('admin.mail.index',$viewData);
    }
}
