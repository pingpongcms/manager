<?php namespace Pingpong\Cms\Manager\Http\Controllers;

use Pingpong\Modules\Repository;
use Pingpong\Modules\Routing\Controller;

class ModulesController extends Controller
{
    /**
     * @var Repository
     */
    protected $modules;

    /**
     * ModulesController constructor.
     * @param Repository $modules
     */
    public function __construct(Repository $modules)
    {
        $this->modules = $modules;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $modules = $this->modules->all();

        return view('manager::index', compact('modules'));
    }

    public function update($name, $status)
    {
        $module = $this->modules->findOrFail($name);

        switch ($status) {
            case 'enable':
                $module->enable();
                break;

            case 'disable':
                $module->disable();
                break;

            default:

                break;
        }

        return redirect()->back();
    }

    public function destroy($name)
    {
        $module = $this->modules->findOrFail($name);

        $module->delete();

        return redirect()->back();
    }

}