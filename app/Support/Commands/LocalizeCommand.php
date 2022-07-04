<?php

namespace App\Support\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class LocalizeCommand extends Command
{
    protected $signature = 'support:localize';

    protected $description = 'Generate locale json file with all words from resource';

    protected array $currentWords = [];

    protected array $newWords = [];

    public function handle()
    {
        $this->currentWords = $this->getCurrentWords();
        $files = $this->getAllFiles();
        $regex = collect([
            "/__\(['\"].*?['\"]\)/",
            "/@lang\(['\"].*?['\"]\)/",
        ]);

        $files->each(function (SplFileInfo $file) use ($regex) {
            $regex->each(fn (string $i) => $this->extractor($file, $i));
        });

        $this->generateFile();

        return 0;
    }

    private function extractor($file, $regex): void
    {
        $handler = function (string $line) {
            $word = (string) Str::of($line)
                                ->replace("@lang('", '')
                                ->replace('@lang("', '')
                                ->replace("__('", '')
                                ->replace("')", '')
                                ->replace('__("', '')
                                ->replace('")', '');

            if (! isset($this->currentWords[$word])) {
                $this->newWords[$word] = '';
            }
        };

        Str::of($file->getContents())->matchAll($regex)->each($handler);
    }

    private function getAllFiles(): Collection
    {
        return collect([
            resource_path('views'),
            app_path(),
            config_path(),
            resource_path('views'),
        ])
            ->transform(fn ($folder) => File::allFiles($folder))
            ->flatten(1)
            ->reject(fn ($file) => $file->getFileName() === 'LocalizeCommand.php');
    }

    private function getCurrentWords()
    {
        $path = resource_path('lang/ar.json');

        return ! File::exists($path) ?
            [] : json_decode(file_get_contents($path), true);
    }

    private function generateFile()
    {
        $file = 'hsm_locale_'.time().'.json';
        file_put_contents(resource_path('lang/'.$file),
            json_encode($this->newWords, JSON_PRETTY_PRINT));

        $this->info("exporting language done successfully {$file}");
    }
}
