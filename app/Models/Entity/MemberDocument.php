<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDocument extends Model
{
    const MEMBER_DOCUMENT_DIRECTORY = 'public/member-files';

    protected $table = 'member_document';
    
}
