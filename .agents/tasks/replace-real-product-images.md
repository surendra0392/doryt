# Task Plan: Integrate Real Product Images & Remove AI Appearance

## Objective
Replace AI-generated / placeholder imagery across the website with the authentic equipment photographs provided in `E:\DO-RYT MACHINE CORP\website-images`, isolate backgrounds onto clean studio white with subtle contact ground shadows, standardize framing and canvas sizes to 4:3 (1600x1200) and high-res wide process banners, update database models/seeders, and eliminate artificial CSS filters (`mix-blend-luminosity`).

## Workflow Steps

### Step 1: Image Processing & Optimization
1. Run background removal using ONNX runtime and composite onto pure `#FFFFFF` canvas.
2. For solid-black background equipment (`12 tray dryer -1`, `24 tray dryer`, `Vibro Shifter`), perform clean boundary matting to white without dark halos.
3. For workshop images (`12 tray dryer`, `Lab Refrigiratr` front & side, `Ribbon Blender`), segment foreground machinery and place on pure studio white with subtle realistic ground contact shadow under wheels/legs.
4. For existing white-background images (`Freeze Dryer`, `Pulvarizer`, `Slicer`, `Balancing Tank`), clean edges and center within standard canvas.
5. Standardize all 11 equipment models onto uniform `1600 x 1200` (4:3) and square assets with safe margins (~10% padding).
6. Process `complete dehydration process sorting to packaging.jpeg` as ultra-clean high-res 10-step process pipeline graphic (2400 x 800) for Homepage and Solutions.
7. Save optimized WebP and high-quality PNG formats into `public/img/products/` and `public/img/`.

### Step 2: Product & Catalog Mapping
Map the 12 photos to catalog entries:
- `12 tray dryer.jpeg` & `12 tray dryer -1.jpeg` -> **FTD-12 Tray Dryer** (under Dryers & Dehydrators)
- `24 tray dryer.jpeg` -> **FTD-24 Tray Dryer** (under Dryers & Dehydrators)
- `Freeze Dryer.jpeg` -> **Vacuum Freeze Dryers** (under Dryers & Dehydrators)
- `Balancing Tank with basket.jpeg` -> **SS-304 Blanching Tank with Basket Hoist** (under Process Equipment / Bleaching & Processing)
- `complete dehydration process sorting to packaging.jpeg` -> **Fruits & Vegetables Turnkey Processing Line** (under Process Equipment & Home Process Section)
- `Lab Refrigiratr deep freezer - front & side view.jpeg` -> **Dual Temperature Chamber (Lab Refrigerator & Deep Freezer)** (under Cold Chain Solutions)
- `Pulvarizer.jpeg` -> **Do-Ryt Automatic Pulverizer** (under Ancillary Equipment)
- `Ribbon Blender.jpeg` -> **Do-Ryt Heavy Duty Ribbon Blender** (under Ancillary Equipment)
- `Slicer.jpeg` -> **Do-Ryt Industrial Vegetable Slicer** (under Ancillary Equipment)
- `Vibro Shifter.jpeg` -> **Do-Ryt Vibro Sifter** (under Ancillary Equipment)

### Step 3: Database & Seeder Update
1. Update `database/seeders/ProductSeeder.php` with actual model titles, specifications, and new image filenames.
2. Run database migration/seeder command to attach the new media to products via Spatie MediaLibrary.

### Step 4: UI & CSS Refinement
1. Remove `mix-blend-luminosity` from:
   - `resources/views/components/cards/product.blade.php`
   - `resources/views/pages/products/show.blade.php`
   - `resources/views/pages/products/index.blade.php`
   - `resources/views/pages/home.blade.php` (flagship, featured, facilities, about)
   - `resources/views/pages/categories/show.blade.php`
2. Feature the real 10-step Turnkey Dehydration Process Line infographic in `home.blade.php` in place of the generic timeline.
3. Set the flagship machine on the homepage to the authentic DO-RYT Vacuum Freeze Dryer or FTD-24 Tray Dryer.

### Step 5: Verification & Quality Assurance
1. Run automated test suite `php artisan test --compact`.
2. Format code with `vendor/bin/pint --format agent`.
3. Inspect rendered pages via browser/curl/HTTP status.
