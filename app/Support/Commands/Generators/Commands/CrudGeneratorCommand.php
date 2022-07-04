<?php

namespace App\Support\Commands\Generators\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CrudGeneratorCommand extends Command
{
    protected $signature = 'generate:crud {--domain=} {--model=} {--M|migration}';

    protected $description = 'Generate a new crud';

    public function handle()
    {
        $controller = $this->getController();
        $datatable = $this->getDatatable();
        $domain = $this->getDomain();
        $model = $this->getModel();
        $view = Str::replace('.', '/', $this->getView($domain, $model));
        $this->info("Creating(Domain)     :   App\Domain\\{$domain}");
        $this->info("Creating(Model)      :   App\Domain\\{$domain}\Models\\{$model}");
        $this->info("Creating(Datatable)  :   App\Domain\\{$domain}\Datatables\\{$datatable}");
        $this->info("Creating(Controller) :   App\Http\Controllers\Dashboard\\{$domain}\\{$controller}");
        $this->info("Creating(View)       :   views/{$view}");
        $this->createFormView($domain, $model);
        if ($this->option('migration')) {
            $table = Str::snake(Str::pluralStudly($model));
            $migrationName = "create_{$table}_table";
            $this->callSilent('make:migration', [
                'name'     => $migrationName,
                '--create' => $table,
            ]);
            $this->info("Creating(migration)       :   database/migrations/{$migrationName}");
        }
    }

    private function getDomain(): ?string
    {
        return DomainGeneratorCommand::lastCreated();
    }

    private function getView($domain, $model): ?string
    {
        $this->runCommand(
            ViewGeneratorCommand::class, [
                'domain'    => $domain,
                'name'      => $model,
                '--silence' => 1,
            ],
            $this->getOutput()
        );

        return ViewGeneratorCommand::lastCreated();
    }

    private function getModel(): ?string
    {
        return ModelGeneratorCommand::lastCreated();
    }

    private function getDatatable(): ?string
    {
        return DatatableGeneratorCommand::lastCreated();
    }

    private function getController(): ?string
    {
        $this->runCommand(
            ControllerGeneratorCommand::class,
            [
                '--silence' => 1,
                '--domain'  => $this->option('domain'),
                '--model'   => $this->option('model'),
            ],
            $this->getOutput()
        );

        return ControllerGeneratorCommand::lastCreated();
    }

    private function createFormView($domain, $model)
    {
        $this->callSilent(ViewFormGeneratorCommand::class,
            ['domain' => $domain, 'name' => $model, '--silence' => 1]);
    }
}
