<?php

namespace GustavoVinicius\BlogPackage\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallBlogPackage extends Command
{
    protected $signature = 'blogpackage:install';
    protected $description = 'Install the BlogPackage';

    public function handle()
    {
        $this->info('Installing BlogPackage...');
        $this->info('Publishin configuration...');

        if(!$this->configExists('blogpackage.php')){
            $this->publishConfiguration();
            $this->info('Published configuration');
        }else{
            if($this->shouldOverWriteConfig()){
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration(true);
            }else{
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed BlogPackage');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverWriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($force = false)
    {
        $params = [
            '--provider' => "GustavoVinicius\BlogPackage\BlogPackageServiceProvider",
            '--tag' => "config"
        ];

        if($force === true){
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}