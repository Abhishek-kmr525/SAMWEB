# SAM Local Development

## Run locally

From this folder:

```bash
./run-local.sh
```

Or directly:

```bash
php -S 127.0.0.1:8092 router.php
```

## Open

- http://127.0.0.1:8092/
- http://127.0.0.1:8092/Products.php
- http://127.0.0.1:8092/sam-2-0.php

## Notes

- `header.php` and `footer.php` are global includes.
- Filenames were normalized to slug style to avoid space-related routing issues.
- `products.php` is kept as a redirect alias for compatibility.
