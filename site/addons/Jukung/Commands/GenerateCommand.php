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
     */
    public function handle()
    {
        $name = strtolower($this->argument('name'));
        $current_theme = Config::get("theming.theme");
        $theme_path = site_path("themes/$current_theme");

        $this->changeCss($theme_path, $current_theme, $name);
        $this->changeJs($theme_path, $current_theme, $name);
        $this->searchAndReplace("$theme_path/webpack.mix.js", $current_theme, $name); // change webpack.mix.js
        $this->searchAndReplace(site_path('settings/theming.yaml'), $current_theme, $name); // change theming.yaml to new theme
        $this->changeThemeDir(site_path('themes'), $current_theme, $name);
    }

    /**
     * Change the name of the theme SCSS file
     * 
     * @param string $path The theme path 
     * @param string $old_name The replaced name
     * @param string $new_name The replacing name
     */
    protected function changeCss($path, $old_name, $new_name)
    {
        rename("$path/src/scss/{$old_name}.scss", "$path/src/scss/{$new_name}.scss");
    }

    /**
     * Change the name of the theme JS file
     * 
     * @param string $path The theme path 
     * @param string $old_name The replaced name
     * @param string $new_name The replacing name
     */
    protected function changeJs($path, $old_name, $new_name)
    {
        rename("$path/src/js/{$old_name}.js", "$path/src/js/{$new_name}.js");
    }

    /**
     * Find a file, replace new_name with old_name, then replace old file with new file
     * 
     * @param string $path The theme path 
     * @param string $old_name The replaced name
     * @param string $new_name The replacing name
     */

    protected function searchAndReplace($path, $old_name, $new_name)
    {
        $text = str_replace($old_name, $new_name, file_get_contents($path));

        file_put_contents($path, $text);
    }

    /**
     * Change name of theme directory
     * 
     * @param string $path The theme path 
     * @param string $old_name The replaced name
     * @param string $new_name The replacing name
     */
    protected function changeThemeDir($path, $old_name, $new_name)
    {
        rename("$path/$old_name", "$path/$new_name");
    }
}
