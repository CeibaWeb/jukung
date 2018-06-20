# Jukung Statamic Generator

This project is developed to give a head-start on building Statamic site the Ceiba way. Basically, it creates a new Statamic site, sets up Laravel Mix, Tailwind CSS, Webpack, and Vue, removes the Statamic default JS scaffolding, and replaces the default theme with your theme name.

## Usage

Add a command to your bash_profile that looks like this:

```
function jukung () {
    ( git clone git@github.com:CeibaWeb/jukung.git $* && cd $PWD/$* && php please jukung:generate $* )
}
```

That way, when you want to make a new Statamic site, all you have to do is:

`jukung new-site-name`

And you site is ready to go! Be sure to add the site to your hosts file as necessary, using Laravel Valet or otherwise.