<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pesi\Models\Role;
use App\Pesi\Models\Permission;
use App\Persona;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Permission_Role;
use App\Incidencia_User;
use App\Incidencia;
class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks=0');
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();

        Permission::truncate();
        Role::truncate();
        User::truncate();
        Incidencia::truncate();

        //user admin
        $useradmin = User::where('email','admin@admin.com')->first();
        if($useradmin){
            $useradmin->delete();
        }
        $useradmin = User::create([
            'name' => 'Kevin',
            'dni' => '74659170',
            'celular' => '968580399',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'estado' => 'Activo'
        ]);

        $roladmin = Role::create([
            'name'=>'Control de alertas',
            'slug'=>'Control de alertas',
            'description'=>'Control de alertas',
            'full-access'=>'no'
        ]);

        $roladmin = Role::create([
            'name'=>'Jefe Seguridad',
            'slug'=>'Jefe de Seguridad',
            'description'=>'Jefe de Seguridad',
            'full-access'=>'no'
        ]);

        //personas
        $persona = Persona::create([
            'dni' => '74659671',
            'nombre' => 'El denunciante',
            'celular' => '968000399',
            'correo' => 'correo@correo.com'
        ]);

        // //incidencias
        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Asesinatos',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Asesinatos',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Asesinatos',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Trafico de drogas',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Trafico de drogas',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Robo al paso',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Robo al paso',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Violaciones',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Pandillaje',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Pandillaje',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        $incidencia = Incidencia::create([
            'dni' => '74659671',
            'categoria' => 'Otro tipo',
            'longitud' => 'longitud',
            'latitud' => 'latitud',
            'descripcion' => 'descripcion',
            'foto' => 'foto',
            'seguido' => 'Alertado',
            'created_at' => '2021-09-23 22:49:17'
        ]);

        //table role_user
        $useradmin->roles()->sync([$roladmin->id]);

        //permixxion_role
        $permission_all = [];


































        $permission = Permission::create([
            'name'=>'user_index',
            'slug'=>'user.index',
            'description'=>'El usuario puede listar usuarios'
        ]);

        $permission = Permission::create([
            'name'=>'user_create',
            'slug'=>'user.create',
            'description'=>'El usuario puede crear usuarios'
        ]);

        $permission = Permission::create([
            'name'=>'user_update',
            'slug'=>'user.update',
            'description'=>'El usuario puede editar usuarios'
        ]);

        $permission = Permission::create([
            'name'=>'user_delete',
            'slug'=>'user.delete',
            'description'=>'El usuario puede eliminar usuarios'
        ]);

        $permission = Permission::create([
            'name'=>'role_index',
            'slug'=>'role.index',
            'description'=>'El usuario puede listar roles'
        ]);

        $permission = Permission::create([
            'name'=>'role_create',
            'slug'=>'role.create',
            'description'=>'El usuario puede crear roles'
        ]);

        $permission = Permission::create([
            'name'=>'role_update',
            'slug'=>'role.update',
            'description'=>'El usuario puede editar roles'
        ]);

        $permission = Permission::create([
            'name'=>'role_delete',
            'slug'=>'role.delete',
            'description'=>'El usuario puede eliminar roles'
        ]);

        $permission = Permission::create([
            'name'=>'bitacora_index',
            'slug'=>'bitacora.index',
            'description'=>'El usuario puede visualizar la bitacora'
        ]);

        $permission = Permission::create([
            'name'=>'inci_repor',
            'slug'=>'inci.repor',
            'description'=>'El usuario puede hacer reportes'
        ]);

        $permission = Permission::create([
            'name'=>'inci_asig',
            'slug'=>'inci.asig',
            'description'=>'El usurio puede asignar personal'
        ]);

        $permission = Permission::create([
            'name'=>'reporte_index',
            'slug'=>'reporte.index',
            'description'=>'El usuario puede visualizar los reportes'
        ]);




        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'1',
        ]);
        
        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'2',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'3',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'4',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'5',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'6',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'7',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'8',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'9',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'11',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'12',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'2',
            'permission_id'=>'9',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'1',
            'permission_id'=>'10',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'1',
            'permission_id'=>'9',
        ]);

        $permission = Permission_Role::create([
            'role_id'=>'1',
            'permission_id'=>'12',
        ]);

    }
        
}
