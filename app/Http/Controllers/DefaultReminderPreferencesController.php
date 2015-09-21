<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\preferencesRequest;
use Illuminate\Http\Request;
use App\ServiceType;
use App\DefaultReminderPreference;

class DefaultReminderPreferencesController extends Controller {
    
    public function index()
    {
        $preferences = DefaultReminderPreference::all();
        $preferences->load('type');
       
        return view('pages.listDefaultReminderPreferences', ['preferences' => $preferences]);
    }
    
    public function add()
    {
        $this->authorize(new DefaultReminderPreference);
        
        $preferences = DefaultReminderPreference::all('service_type_id');
        $types = ServiceType::whereNotIn('id',$preferences)->get();
        
        
        return view('pages.addDefaultReminderPreference', ['serviceTypes' => $types]);
    }
    
    public function store(preferencesRequest $request)
    {
        $this->authorize(new DefaultReminderPreference);
        
        $preference = DefaultReminderPreference::create($request->all());
        $preference->save();
        
        return redirect('services/preferences');
    }
    
    public function edit($id)
    {
        $preference = DefaultReminderPreference::findOrFail($id);
        $this->authorize($preference);
        
        return view('pages.editDefaultReminderPreference', ['preference' => $preference]);
    }
    
    public function update(Request $request, $id)
    {
        $preference = DefaultReminderPreference::findOrFail($id);
        
        $this->authorize($preference);
        $preference->update($request->all());
        
        return redirect('services/preferences');
    }
    
}
