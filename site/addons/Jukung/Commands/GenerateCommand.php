<?php

namespace Statamic\Addons\Jukung\Commands;

use Statamic\Extend\Command;
use Statamic\API\Config;

class GenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jukung:generate {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a command using the Jukung template';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = strtolower($this->argument('name'));

        $current_theme = Config::get("theming.theme");

        $theme_path = site_path("themes/$current_theme");

        $this->changeCss($theme_path, $current_theme, $name);

        $this->changeJs($theme_path, $current_theme, $name);

        $this->changeMixConfig($theme_path, $current_theme, $name);

        $this->changeThemeConfig(site_path('settings/theming.yaml'), $current_theme, $name);

        $this->changeThemeDir(site_path('themes'), $current_theme, $name);

        Config::set("theming.theme", $name);

    }

    protected function changeCss($path, $old_name, $new_name)
    {
        rename("$path/src/scss/{$old_name}.scss", "$path/src/scss/{$new_name}.scss");
    }

    protected function changeJs($path, $old_name, $new_name)
    {
        rename("$path/src/js/{$old_name}.js", "$path/src/js/{$new_name}.js");
    }

    protected function changeMixConfig($path, $old_name, $new_name)
    {
        $text = str_replace($old_name, $new_name, file_get_contents("$path/webpack.mix.js"));

        file_put_contents("$path/webpack.mix.js", $text);
    }

    protected function changeThemeConfig($path, $old_name, $new_name)
    {
        $text = str_replace($old_name, $new_name, file_get_contents($path));

        file_put_contents($path, $text);
    }

    protected function changeThemeDir($path, $old_name, $new_name)
    {
        rename("$path/$old_name", "$path/$new_name");
    }
}
