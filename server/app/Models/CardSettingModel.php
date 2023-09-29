<?php
namespace App\Models;
use CodeIgniter\Model;

class CardSettingModel extends Model
{
    protected $table = 'card_settings';
    protected $primaryKey = 'card_id';
    protected $allowedFields = ['pid','post_id','card_pinned','card_highlight'];

}