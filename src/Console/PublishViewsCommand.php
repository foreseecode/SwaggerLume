<?php

namespace SwaggerLume\Console;

use Illuminate\Console\Command;
use SwaggerLume\Console\Helpers\Publisher;

class PublishViewsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'swagger-lume:publish-views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish views';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $default = realpath(__DIR__ . '/../../resources/views/') . '/index.blade.php';
        $file = config('swagger-lume.paths.blade', $default);
        if ($file !== false) {
            $this->info('Publishing view files');

            if ($file === true) {
                $file = $default;
            }

            (new Publisher($this))->publishFile(
                $file,
                config('swagger-lume.paths.views'),
                'index.blade.php'
            );
        }
    }
}
