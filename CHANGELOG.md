# Changelog

## [1.0.7] - 2023-11-04

### Fixed

- Resolved an issue where files from the disk could not be loaded without a leading slash.

## [1.0.6] - 2022-09-23

### Fixed

- Removed Deprecated Error when `APP_KEY` was not set

## [1.0.5] - 2022-03-15

### Fixed

- Added support for Laravel 9

## [1.0.4] - 2021-11-29

### Fixed

- Windows can't create dirs named `aux`, `prn`, `con`. Subdirs are now 2 chars long. Old: `xxx/xxxxxxxx.jpg`, New: `xx/xx/xxxxxxx.jpg`.

## [1.0.3] - 2021-11-22

### Fixed

- Loading images with http did not work with special chars in the url. The url is now escaped.
