<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\rewardsRequest;
use Illuminate\Http\Request;
use App\Reward;

class RewardController extends Controller {
    
    public function index()
    {
        $rewards = Reward::all();
        
        return view('pages.listRewards',['rewards' => $rewards]);
    }
    
    public function add()
    {
        return view('pages.addReward');
    }
    
    public function store(rewardsRequest $request)
    {
        $reward = Reward::create($request->all());
        $reward->save();
        
        return redirect('rewards');
    }
    
    public function edit($id)
    {
        $reward = Reward::find($id);
        
        return view('pages.editReward',['reward' => $reward, 'id' => (int) $id]);
    }
    
    public function update(Request $request,$id)
    {
        $reward = Reward::find($id);
        $reward->update($request->all());
        
        return redirect('rewards');
    }
}