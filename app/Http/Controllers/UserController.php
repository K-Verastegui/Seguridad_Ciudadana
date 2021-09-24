<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Pesi\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Bitacora;
use Exception;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('id','Desc')->paginate(5);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $bitacora = new Bitacora();
            $bitacora->user = auth()->user()->name;
            $bitacora->equipo = gethostname();
            $bitacora->descripcion = 'Crear personal';
            $bitacora->tabla = 'users';
            $bitacora->save();

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->celular = $request->celular;
            $user->estado = $request->estado;
            $user->dni = $request->dni;
            $user->password = Hash::make($request['password']);
            $user->save();

            DB::commit();
            return redirect()->route('user.index')->with('status_success','Personal created saccessfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$this->authorize('haveaccess','user.show','userown.show');
        $roles = Role::orderBy('name')->get();
        return view('user.view',compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        $roles = Role::orderBy('name')->get();
        return view('user.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try{
            DB::beginTransaction();

            $bitacora = new Bitacora();
            $bitacora->user = auth()->user()->name;
            $bitacora->equipo = gethostname();
            $bitacora->descripcion = 'Actualizar personal';
            $bitacora->tabla = 'users';
            $bitacora->save();

            $request->validate([
                'name'=>'required|max:50|unique:users,name,'. $user->id,
                'dni'=>'required|max:8|unique:users,dni,'. $user->id,
                'celular'=>'required|max:9'. $user->id,
                'email'=>'required|max:50|unique:users,email,'. $user->id,
            ]);
            
            $user->update($request->all());
    
            $user->roles()->sync($request->get('role_id'));

            DB::commit();
            return redirect()->route('user.index')->with('status_success','Personal updated saccessfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            DB::beginTransaction();

            $bitacora = new Bitacora();
            $bitacora->user = auth()->user()->name;
            $bitacora->equipo = gethostname();
            $bitacora->descripcion = 'Eliminar personal';
            $bitacora->tabla = 'users';
            $bitacora->save();

            $user->delete();

            DB::commit();
            return redirect()->route('user.index')->with('status_success','Personal removed saccessfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('user.index');
        }
    }  
}
