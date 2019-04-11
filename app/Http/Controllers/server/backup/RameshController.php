<?php

namespace App\Http\Controllers\server;

use App\User;
use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RameshController extends ServerController
{

    public function addValidation(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->title('Server Control'));
            $this->data('server', Server::all());
            $this->data('codeData', Server::all());
            return view($this->pagePath . 'Validation.addValidation', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|unique:users,name',
            ]);

            $data['name'] = ($request->name);

            if (Server::create($data)) {
                $this->data('codeData', Server::All());
                return redirect()->route('addValidation')->with('success', 'Code Generate successfully');
            }

        }

    }
    public function editValidation($id)
    {
        $this->data('server', Server::findOrFail($id));
        $this->data('server', Server::all());
        $this->data('codeData', Server::all());
        return view($this->pagePath.'Validation.editValidation',$this->data);
    }
    public function updateValidation(Request $request, $id)
    {
        $Server = Server::findOrFail($id);
        $Server->name = \request('name');

        $Server->save();
        return redirect()->route('addValidation')->with('success', 'Record Updated');
    }

}
