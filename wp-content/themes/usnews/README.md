# usnews — WordPress Theme

Pixel-accurate recreation of the U.S. News & World Report homepage. No visual redesign.

- **Install & deploy:** see [`../DEPLOY.md`](../DEPLOY.md)
- **Requirements:** WordPress 6.0+, PHP 7.4+, Elementor optional

## Quick start

1. Copy this folder to `wp-content/themes/usnews`.
2. **Appearance → Themes → Activate**.
3. Open the site root — `front-page.php` renders the homepage.

## Architecture

`functions.php` is a thin bootstrap that loads modules from `/inc`:

| Module | Responsibility |
|--------|----------------|
| `inc/setup.php` | Theme supports, menus, meta |
| `inc/enqueue.php` | Ordered CSS/JS enqueue + `defer` |
| `inc/template-tags.php` | Nav helpers, placeholder image |
| `inc/class-usnews-nav-walker.php` | Flat `<a>` menu walker |
| `inc/shortcodes.php` | `[usnews_home]`, `[usnews_section]` |
| `inc/elementor.php` | Elementor page template + compat |

Markup lives in `template-parts/home-main.php`; styles in `assets/css/` (token-driven); behavior in `assets/js/main.js`.
