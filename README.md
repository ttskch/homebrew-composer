# homebrew-composer

[![](https://github.com/ttskch/homebrew-composer/actions/workflows/cron.yaml/badge.svg?branch=main)](https://github.com/ttskch/homebrew-composer/actions/workflows/cron.yaml?query=branch:main)

🍺 Homebrew tap for [Composer](https://getcomposer.org/)

## Supported versions

All versions listed at <https://getcomposer.org/download/#manual-download> are supported.

This tap is **automatically updated every day** by GitHub Actions. See [this workflow](.github/workflows/cron.yaml) for details.

## Installation

```shell
$ brew install ttskch/composer/composer@2.7.6
$ brew link --force --overwrite ttskch/composer/composer@2.7.6
```

## Uninstallation

```shell
$ brew uninstall composer@2.7.6
$ brew untap ttskch/composer

# If you want to switch back to the original composer from homebrew-core
$ brew unlink composer && brew link composer
```
