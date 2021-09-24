<?php

namespace App\Http\Controllers;
use App\Pesi\Models\Role;
use App\Pesi\Models\Permission;
use Illuminate\Http\Request;
use App\Bitacora;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','Desc')->paginate(7);
        return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('role.create',compact('permissions'));
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
            $bitacora->descripcion = 'Crear rol';
            $bitacora->tabla = 'users';
            $bitacora->save();

            $request->validate([
                'name'=>'required|max:50|unique:roles,name',
                'slug'=>'required|max:50|unique:roles,slug',
                'full-access'=>'required|in:yes,no'
            ]);
    
            $role = Role::create($request->all());
            $role->permissions()->sync($request->get('permission'));

            DB::commit();
            return redirect()->route('role.index')->with('status_success','Role saved saccessfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('role.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permission_role = [];
        foreach($role->permissions as $permission)
        {
            $permission_role[] = $permission->id;
        }
        //return $permission_role;
        $permissions = Permission::get();
        return view('role.view',compact('permissions','role','permission_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission_role = [];
        foreach($role->permissions as $permission)
        {
            $permission_role[] = $permission->id;
        }
        //return $permission_role;
        $permissions = Permission::get();
        return view('role.edit',compact('permissions','role','permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        try{
            DB::beginTransaction();

            $bitacora = new Bitacora();
            $bitacora->user = auth()->user()->name;
            $bitacora->equipo = gethostname();
            $bitacora->descripcion = 'Actualizar rol';
            $bitacora->tabla = 'users';
            $bitacora->save();

            $request->validate([
                'name'=>'required|max:50|unique:roles,name,'. $role->id,
                'slug'=>'required|max:50|unique:roles,slug,'. $role->id,
                'full-access'=>'required|in:yes,no'
            ]);
    
            $role->update($request->all());
    
            $role->permissions()->sync($request->get('permission'));

            DB::commit();
            return redirect()->route('role.index')->with('status_success','Role updated saccessfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('role.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try{
            DB::beginTransaction();

            $bitacora = new Bitacora();
            $bitacora->user = auth()->user()->name;
            $bitacora->equipo = gethostname();
            $bitacora->descripcion = 'Eliminar rol';
            $bitacora->tabla = 'users';
            $bitacora->save();

            $role->delete();

            DB::commit();
            return redirect()->route('role.index')->with('status_success','Role removed saccessfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('role.index');
        }
    }
}
