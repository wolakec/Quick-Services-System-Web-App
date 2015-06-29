<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Reward;


class AppRewardsController extends Controller {
    
    public function viewRewards()
    {
        $rewards = Reward::where('cost','>','0')->orderBy('cost','asc')->get();
        
        return $rewards;
    }
}
