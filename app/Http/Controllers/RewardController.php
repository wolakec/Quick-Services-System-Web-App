<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\rewardsRequest;
use Illuminate\Http\Request;
use App\Reward;

class RewardController extends Controller {
    
    public function index()
    {
        $rewards = Reward::simplePaginate(10);
        
        return view('pages.listRewards',['rewards' => $rewards]);
    }
    
    public function add()
    {
        $this->authorize('addReward', []);
        return view('pages.addReward');
    }
    
    public function store(rewardsRequest $request)
    {
        $this->authorize('addReward', []);
        $reward = Reward::create($request->all());
        $reward->save();
        
        return redirect('rewards');
    }
    
    public function edit($id)
    {
        $reward = Reward::findOrFail($id);
        $this->authorize('edit', $reward);
        
        return view('pages.editReward',['reward' => $reward, 'id' => (int) $id]);
    }
    
    public function update(Request $request,$id)
    {
        $reward = Reward::find($id);
        
        $this->authorize('edit', $reward);
        
        $reward->update($request->all());
        
        return redirect('rewards');
    }
}