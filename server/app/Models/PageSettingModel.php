<?php
namespace App\Models;
use CodeIgniter\Model;

class PageSettingModel extends Model
{
    protected $table = 'page_settings';
    protected $primaryKey = 'idpage_settings';
    protected $allowedFields = ['pid','cards_per_row','hero','profile','flat_card','time_stamp'];

}