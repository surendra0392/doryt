<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $dryersCat = Category::where('name', 'Dryers & Dehydrators')->first();
        $processCat = Category::where('name', 'Process Equipment')->first();
        $coldChainCat = Category::where('name', 'Cold Chain Solutions')->first();
        $ancillaryCat = Category::where('name', 'Ancillary Equipment')->first();

        if (! $dryersCat || ! $processCat || ! $coldChainCat || ! $ancillaryCat) {
            $this->command->warn('Run CategorySeeder before ProductSeeder.');

            return;
        }

        $products = [
            // ─── Dryers & Dehydrators ───
            [
                'name' => 'FTD-12 Industrial Tray Dryer',
                'category_id' => $dryersCat->id,
                'short_description' => '12-tray stainless steel electric tray dryer with digital temperature controller, uniform forced-air circulation, and food-grade SS-304 construction.',
                'full_description' => '<p>The DO-RYT FTD-12 Tray Dryer is precision-engineered for uniform, batch dehydration of fruits, vegetables, herbs, spices, and nutraceutical products. Featuring a high-accuracy digital temperature controller, high-efficiency blower, and durable SS-304 food-grade contact parts, this unit ensures reliable moisture extraction while preserving product color, flavor, and active compounds.</p><p>Equipped with thermal-insulated double wall construction, silicone door gasket, and heavy-duty locking castors for effortless mobility on the production floor.</p>',
                'features' => ['12 Food-Grade SS Trays', 'Digital PID Temperature Controller', 'High-Velocity Blower Airflow', 'Heavy-Duty Castor Wheels for Mobility', 'Thermal Insulated SS-304 Body', 'Safety Over-Temperature Cutoff'],
                'technical_specifications' => ['Model' => 'FTD-12', 'Tray Capacity' => '12 Trays (16" x 32")', 'Temperature Range' => 'Ambient to 95°C', 'Power Supply' => '220V Single Phase / 415V 3-Phase', 'Body Material' => 'SS-304 Food Grade', 'Airflow' => 'Motorized Recirculating Fan'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => '12 Trays Standard (SS-304)',
                        'specifications' => ['Capacity' => '12 Trays', 'Power' => '3 kW / 220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => '12 Trays GMP Pharma (SS-316L)',
                        'specifications' => ['Capacity' => '12 Trays', 'Power' => '3 kW / 415V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 1,
                'image' => 'ftd_12_tray_dryer.png',
                'gallery' => ['ftd_12_tray_dryer_front.png'],
            ],
            [
                'name' => 'Heat Pump Dehydrators',
                'category_id' => $dryersCat->id,
                'short_description' => 'Energy-efficient heat pump drying technology that gently removes moisture while preserving colour, flavour, and nutritional value.',
                'full_description' => 'Leveraging advanced heat pump technology, these dehydrators achieve exceptional energy efficiency by recovering and recycling heat. Low-temperature operation preserves the natural characteristics of sensitive products, making them perfect for premium dried goods.',
                'features' => ['Low Operating Cost', 'Closed-Loop Heat Recovery', 'Gentle Low-Temp Drying', 'Preserves Colour & Nutrients'],
                'technical_specifications' => ['Temperature Range' => '20°C – 60°C', 'Capacity' => '100 – 2000 kg/batch', 'Energy Savings' => 'Up to 50% vs Electric'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 2,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'FTD-24 Industrial Tray Dryer',
                'category_id' => $dryersCat->id,
                'short_description' => '24-tray industrial dehydration chamber with precision digital controls, double-door thermal seal, and heavy-duty stainless steel frame.',
                'full_description' => '<p>The DO-RYT FTD-24 Tray Dryer provides commercial-scale dehydration throughput with 24 high-capacity trays. Equipped with an ergonomic front control panel, automated blower circulation, heating element status indicators, and heavy-duty mobile castors, it is built for continuous production across agro-processing, food, and herbal manufacturing.</p><p>Built with sanitary welds and optimized plenum ducting for identical drying rates across all 24 tray levels.</p>',
                'features' => ['24 Standard SS Trays Capacity', 'Microprocessor Temperature Controller', 'Even Heat Distribution Ducts', 'Dual Heavy-Duty Latches with Silicone Seal', 'Energy-Optimized Heating Elements', 'Industrial Floor Castors with Locks'],
                'technical_specifications' => ['Model' => 'FTD-24', 'Tray Capacity' => '24 Trays (16" x 32")', 'Temperature Range' => 'Ambient to 110°C', 'Air Circulation' => 'Motorized Forced Draft', 'MOC' => 'SS-304 / SS-316', 'Heating Load' => '6 kW – 12 kW'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => '24 Trays Standard (SS-304)',
                        'specifications' => ['Capacity' => '24 Trays', 'Power' => '6 kW / 415V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => '24 Trays GMP Pharma (SS-316L)',
                        'specifications' => ['Capacity' => '24 Trays', 'Power' => '6 kW / 415V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 3,
                'image' => 'ftd_24_tray_dryer.png',
            ],
            [
                'name' => 'Vacuum Tray Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'Low-temperature vacuum drying systems for heat-sensitive pharmaceutical, chemical, and high-value food materials.',
                'full_description' => 'Vacuum Tray Dryers operate under reduced pressure to enable moisture evaporation at lower temperatures. The SS-316L trays and vacuum chamber ensure contamination-free drying of APIs, intermediates, nutraceuticals, and specialty foods.',
                'features' => ['Low-Temperature Drying', 'Vacuum Operation (<1 Pa)', 'SS-316L Trays', 'cGMP Compliant Design'],
                'technical_specifications' => ['Vacuum Level' => '< 1 Pa', 'Temperature Range' => '30°C – 85°C', 'Tray Capacity' => '24 – 288 trays'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 4,
                'image' => 'flagship_machine_1783126168912.png',
            ],
            [
                'name' => 'Rotary Drum Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'Continuous rotary drum drying technology for high-volume processing of granular, powdered, and fibrous materials.',
                'full_description' => 'Our Rotary Drum Dryers utilize a rotating cylindrical drum with internal lifting flights to cascade material through a heated air stream. Ideal for fertilizers, biomass, minerals, and bulk food ingredients requiring continuous high-capacity drying.',
                'features' => ['Continuous Operation', 'Internal Lifting Flight Design', 'High Thermal Efficiency', 'Heavy-Duty Construction'],
                'technical_specifications' => ['Drum Diameter' => '1.0 – 3.5 m', 'Drum Length' => '6 – 30 m', 'Capacity' => '1 – 50 tons/h'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 5,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Continuous Belt Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'Multi-stage conveyor belt drying systems offering continuous, uniform drying for extruded, formed, and sliced products.',
                'full_description' => 'Multi-zone continuous belt dryers provide precise control over temperature, humidity, and belt speed across different stages. Designed for snacks, cereals, fruits, vegetables, and industrial products requiring consistent moisture profiles.',
                'features' => ['Multi-Zone Temperature Control', 'Variable Speed Conveyor', 'Recirculating Air System', 'Modular Expandable Design'],
                'technical_specifications' => ['Belt Width' => '1.0 – 4.0 m', 'Number of Stages' => '3 – 7', 'Capacity' => '200 – 5000 kg/h'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 6,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Vacuum Freeze Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'State-of-the-art lyophilization systems with INVT touchscreen HMI, vacuum sublimation chamber, and cryogenic condensation.',
                'full_description' => '<p>DO-RYT Vacuum Freeze Dryers deliver premier lyophilization technology, removing moisture via sublimation at ultra-low temperatures under deep vacuum. Featuring an intuitive INVT touchscreen PLC controller, precision pressure gauge, multi-tier product shelf rack, and heavy-duty silicone vacuum sealing ring, this flagship machine retains 98%+ of biological nutrients, aromas, and cellular structure in high-value food, fruits, pharma, and biologics.</p><p>Constructed from polished SS-304/316 with automated defrosting, cascade refrigeration, and industrial lockable castors.</p>',
                'features' => ['INVT Color Touchscreen PLC Interface', 'Sublimation Freeze-Drying Technology', 'Ultra-Low Temperature Condenser (-50°C to -80°C)', 'Sanitary SS-304/316 Chamber with Heavy-Duty Seal Ring', 'Multi-Tier Removable Stainless Steel Shelves', 'Integrated High-Vacuum Pumping System'],
                'technical_specifications' => ['Control System' => 'INVT Touchscreen PLC', 'Condenser Temp' => '-50°C to -80°C', 'Ultimate Vacuum' => '< 10 Pa', 'Shelf System' => 'Multi-Tier SS Heated Shelves', 'MOC' => 'SS-304 / SS-316L', 'Refrigeration' => 'Cascade Eco-Friendly System'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Pilot Scale Lyophilizer',
                        'specifications' => ['Capacity' => '5 – 10 kg/batch', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Industrial Production Lyophilizer',
                        'specifications' => ['Capacity' => '50 – 500 kg/batch', 'Power' => '415V 3-Phase', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 7,
                'image' => 'vacuum_freeze_dryer.png',
            ],
            [
                'name' => 'Spray Dryers',
                'category_id' => $dryersCat->id,
                'short_description' => 'High-speed spray drying systems for converting liquid feeds into free-flowing powders with precise particle size control.',
                'full_description' => 'Spray Dryers atomize liquid feed into fine droplets within a heated drying chamber, producing uniform spherical powders in a single continuous step. Suitable for dairy, egg, pharmaceutical, and chemical powder production.',
                'features' => ['Rotary / Nozzle Atomization', 'Precise Particle Size Control', 'Short Dwell Time', 'FSSAI / cGMP Compliant Options'],
                'technical_specifications' => ['Evaporation Rate' => '50 – 5000 kg/h', 'Inlet Temperature' => '150°C – 250°C', 'Outlet Temperature' => '70°C – 110°C'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 8,
                'image' => 'cat_freeze_dryers_1783126120106.png',
            ],
            [
                'name' => 'Instant Quick Freezers (IQF)',
                'category_id' => $dryersCat->id,
                'short_description' => 'Individual quick freezing systems that rapidly freeze food products individually, preserving texture, moisture, and quality.',
                'full_description' => 'Our IQF freezers use ultra-low-temperature air blast or cryogenic technology to freeze individual pieces rapidly, preventing ice crystal formation and clumping. Ideal for fruits, vegetables, seafood, and ready-to-eat meals.',
                'features' => ['Individual Product Freezing', 'Ultra-Rapid Freeze Cycle', 'No Clumping / Agglomeration', 'Available in Trolley & Tunnel Configurations'],
                'technical_specifications' => ['Freezing Temperature' => '-40°C to -80°C', 'Capacity' => '100 – 5000 kg/h', 'Refrigerant' => 'Ammonia / Freon / Cryogenic'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 9,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],

            // ─── Process Equipment ───
            [
                'name' => 'Fruits & Vegetables Processing Line',
                'category_id' => $processCat->id,
                'short_description' => 'Complete 10-step turnkey industrial processing line from sorting and bubble washing to slicing, blanching, drying, and packaging.',
                'full_description' => '<p>A complete integrated turnkey manufacturing solution for fruits and vegetables. Engineered by DO-RYT to cover the complete dehydration pipeline: 1. Raw Material Receiving & Sorting Table, 2. Bubble Washing Tank, 3. Inspection & Preparation Table, 4. Industrial Slicer/Dicer, 5. SS-304 Blanching Tank with Basket Hoist, 6. Cold Water Cooling Tank, 7. Centrifugal Dewatering Unit, 8. Tray Loading Trolley, 9. Hot Air Tray Dryer, and 10. Final Collection & Packing Table.</p><p>Each station is modularly interconnected for seamless flow, maximum product yield, and strict compliance with HACCP food hygiene standards.</p>',
                'features' => ['10-Stage Continuous Processing Flow', 'SS-304 Sanitary Food-Grade Construction', 'Integrated Pneumatic / Electric Hoist on Blanching', 'High-Efficiency Bubble Wash Air Agitation', 'Rapid Centrifugal Water Extraction', 'Complete Turnkey Design & Commissioning'],
                'technical_specifications' => ['Pipeline Stages' => '10 Integrated Units', 'Throughput' => '500 kg/h – 5000 kg/h', 'Washing System' => 'Continuous Bubble Air-Agitation', 'Dewatering' => 'High-Speed Spin Extraction', 'MOC' => 'Complete SS-304', 'Automation' => 'Centralized Electrical Controls'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => '500 kg/h Turnkey Line',
                        'specifications' => ['Capacity' => '500 kg/h', 'Power' => '50 kW', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => '2000 kg/h High-Capacity Turnkey Line',
                        'specifications' => ['Capacity' => '2000 kg/h', 'Power' => '150 kW', 'Material' => 'SS-304'],
                    ],
                ],
                'sort_order' => 10,
                'image' => 'complete_dehydration_process_line.png',
                'gallery' => ['dehydration_process_line_panoramic.png'],
            ],
            [
                'name' => 'Papad & Chapati/Roti Making Line',
                'category_id' => $processCat->id,
                'short_description' => 'Automated production line for papad, chapati, and roti with dough preparation, sheeting, cutting, and baking/drying stations.',
                'full_description' => 'Specialized line for high-volume flatbread and papad production. Features automated dough kneading, rotary sheeting, die-cutting, and continuous baking or drying. Customizable for various thicknesses, diameters, and recipes.',
                'features' => ['Automated Dough Handling', 'Rotary Sheeting & Die-Cutting', 'Continuous Baking / Drying', 'Adjustable Thickness & Diameter'],
                'technical_specifications' => ['Production Capacity' => '1000 – 10000 pcs/h', 'Product Diameter' => '4 – 12 inches', 'Power Requirement' => '30 – 100 kW'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 11,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Egg Dehydration Line',
                'category_id' => $processCat->id,
                'short_description' => 'Complete egg breaking, pasteurizing, and dehydration system for producing egg powder and liquid egg products.',
                'full_description' => 'End-to-end egg processing line featuring automated washing, breaking, separation, pasteurization, and spray drying. Produces whole egg powder, yolk powder, and albumen powder with consistent quality and extended shelf life.',
                'features' => ['Automated Egg Breaking & Separation', 'HTST Pasteurization', 'Spray Drying for Egg Powder', 'CIP Cleaning System'],
                'technical_specifications' => ['Egg Capacity' => '10000 – 60000 eggs/h', 'Powder Output' => '100 – 1000 kg/h', 'Pasteurization' => 'HTST 66°C / 3.5 min'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 12,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Chips Making Line',
                'category_id' => $processCat->id,
                'short_description' => 'Complete potato chips and snack food production line from washing, slicing, and frying to seasoning and packaging.',
                'full_description' => 'High-capacity potato chips production line engineered for consistent quality. Features automatic destoning, steam peeling, high-speed slicing, continuous frying with oil filtration, seasoning application, and packaging integration.',
                'features' => ['Continuous Frying with Oil Filtration', 'High-Speed Rotary Slicer', 'Automated Seasoning System', 'Energy-Efficient Design'],
                'technical_specifications' => ['Production Capacity' => '50 – 500 kg/h', 'Frying Temperature' => '150°C – 190°C', 'Oil Filtration' => 'Continuous Automatic'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 13,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Meat Processing Line',
                'category_id' => $processCat->id,
                'short_description' => 'Hygienic meat processing and packaging line designed for fresh, frozen, and value-added meat products.',
                'full_description' => 'Complete meat processing solution including grinding, mixing, emulsifying, forming, cooking, and packaging stations. Constructed with SS-304 materials and designed for easy sanitation, meeting international food safety standards.',
                'features' => ['Hygienic SS-304 Construction', 'Automated Grinding & Emulsifying', 'Forming & Cooking Stations', 'MAP / Vacuum Packaging Integration'],
                'technical_specifications' => ['Capacity' => '500 – 5000 kg/h', 'Cutting Temperature' => '< 4°C Controlled', 'Compliance' => 'HACCP / ISO 22000'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 14,
                'image' => 'cat_food_processing_1783126130193.png',
            ],
            [
                'name' => 'Shrimp/Fish Processing Line',
                'category_id' => $processCat->id,
                'short_description' => 'Specialized seafood processing line for shrimp, fish, and marine products including grading, peeling, freezing, and packaging.',
                'full_description' => 'Our seafood processing line covers the entire value chain from receiving and grading to peeling, deveining, IQF freezing, and glazing. Designed for both freshwater and marine species with emphasis on yield optimization and hygiene.',
                'features' => ['Automatic Grading & Sorting', 'Mechanical Peeling & Deveining', 'IQF Freezing Integration', 'Glazing & Packaging Station'],
                'technical_specifications' => ['Processing Capacity' => '500 – 3000 kg/h', 'Freezing Temperature' => '-40°C IQF', 'Material' => 'SS-304 / Food-Grade'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 15,
                'image' => 'cat_food_processing_1783126130193.png',
            ],

            // ─── Cold Chain Solutions ───
            [
                'name' => 'Dual Temperature Chamber (Lab Refrigerator & Deep Freezer)',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Commercial dual-temperature chamber combining independent lab refrigeration and ultra-low deep freezer sections with dual digital controllers.',
                'full_description' => '<p>The DO-RYT Dual Temperature Chamber provides two independent, hermetically sealed temperature zones in a single compact footprint: an upper Lab Refrigerator compartment and a lower Deep Freezer compartment. Controlled via dual high-precision digital PID temperature panels with independent compressor management, alarm systems, and mains switching. Ideal for R&D laboratories, seed preservation, pharmaceutical testing, and cold storage sampling.</p><p>Constructed with polished SS-304 panels, heavy-duty industrial door hinges, latch locks, and lockable castor wheels for easy mobility.</p>',
                'features' => ['Dual Independent Temperature Zones', 'Separate Digital Microprocessor Controllers', 'Audio-Visual High/Low Alarms', 'Heavy-Duty SS-304 Interior and Exterior', 'Industrial Mobility Castors with Locking Brakes', 'Hermetic Low-Noise Compressors'],
                'technical_specifications' => ['Zones' => '2 (Lab Refrigerator + Deep Freezer)', 'Refrigeration Range' => '+2°C to +8°C', 'Deep Freezer Range' => '-20°C to -40°C', 'Controller' => 'Dual Digital PID with Independent Sensors', 'MOC' => 'All Stainless Steel SS-304', 'Power' => '220V 50Hz'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Dual Zone Standard (SS-304)',
                        'specifications' => ['Capacity' => 'Dual 250L', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Dual Zone Pharma GMP (SS-316L)',
                        'specifications' => ['Capacity' => 'Dual 500L', 'Power' => '220V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 16,
                'image' => 'lab_refrigerator_deep_freezer_side.png',
                'gallery' => ['lab_refrigerator_deep_freezer_front.png'],
            ],
            [
                'name' => 'Refrigeration Vans',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Mobile refrigeration units and reefer van bodies for temperature-controlled transport of perishable goods.',
                'full_description' => 'Custom-built refrigeration van bodies mounted on chassis of choice. Features hermetic compressor units, digital temperature controllers, and GPS-enabled temperature monitoring for cold chain integrity during transit.',
                'features' => ['Custom Van Body Fabrication', 'Hermetic Refrigeration Unit', 'Digital Temperature Control', 'GPS Temperature Monitoring'],
                'technical_specifications' => ['Van Volume' => '5 – 40 cubic meters', 'Temperature Range' => '-20°C to +15°C', 'Insulation' => 'PUF 75 – 100 mm'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 17,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],
            [
                'name' => 'Growth Chambers (Saffron, Mushroom etc.)',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Controlled environment growth chambers for commercial cultivation of saffron, mushrooms, and specialty crops.',
                'full_description' => 'Precision-controlled growth chambers with programmable temperature, humidity, lighting, and CO2 management. Designed for optimized commercial production of high-value crops requiring specific environmental conditions throughout their growth cycle.',
                'features' => ['Programmable Environment Control', 'LED Lighting with Spectrum Control', 'Humidity & CO2 Management', 'Data Logging & Remote Monitoring'],
                'technical_specifications' => ['Temperature Range' => '5°C – 40°C', 'Humidity Range' => '40% – 95% RH', 'Lighting' => 'Full-Spectrum LED'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 18,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],
            [
                'name' => 'Seed Germination Chamber',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Specialized chambers with controlled temperature and humidity for seed germination, plant breeding, and research applications.',
                'full_description' => 'Our Seed Germination Chambers provide precise environmental conditions essential for consistent germination rates and healthy seedling development. Features programmable diurnal cycles, uniform air distribution, and contamination-free interiors.',
                'features' => ['Precise Temperature Control', 'Diurnal Cycle Programming', 'Uniform Air Distribution', 'Contamination-Free Interior'],
                'technical_specifications' => ['Temperature Range' => '5°C – 50°C', 'Humidity' => '50% – 90% RH', 'Lighting' => 'Fluorescent / LED Options'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 19,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],
            [
                'name' => 'Cold Storage Units (up to 20,000 MT)',
                'category_id' => $coldChainCat->id,
                'short_description' => 'Large-scale industrial cold storage solutions for bulk agricultural commodities, frozen foods, and cold chain logistics.',
                'full_description' => 'Industrial-scale cold storage facilities designed for capacities from 1,000 to 20,000 metric tons. Features ammonia or Freon-based refrigeration systems, automated racking integration, temperature zoning, and warehouse management system compatibility.',
                'features' => ['Ammonia / Freon Refrigeration', 'Capacity Up to 20,000 MT', 'Multi-Zone Temperature Control', 'WMS Integration Ready'],
                'technical_specifications' => ['Storage Capacity' => '1,000 – 20,000 MT', 'Temperature Range' => '-25°C to +15°C', 'Refrigeration' => 'Ammonia / Freon'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 20,
                'image' => 'cat_cold_storage_1783126148402.png',
            ],

            // ─── Ancillary Equipment ───
            [
                'name' => 'Do-Ryt Industrial Slicer',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Multi-purpose high-speed vegetable and fruit cutting machine with interchangeable circular discs for slicing, dicing, shredding, and grating.',
                'full_description' => '<p>The DO-RYT Industrial Vegetable Slicer offers unmatched cutting versatility for commercial kitchens, food processing plants, and dehydration lines. Featuring heavy-duty all-stainless steel construction, quick-clamp feed hopper, power-saver motor, emergency stop button, and multiple interchangeable cutting discs (fine slicing, thick slicing, julienne, dicing grids, and grating plates).</p><p>Easy disassembly allows quick sanitation between varying produce batches.</p>',
                'features' => ['6 Interchangeable Cutter Discs Included', 'Quick-Release Clamping Hopper for Fast Cleanout', 'Safety Interlock & Emergency Stop Button', 'Energy-Efficient High-Torque Motor', 'Compact Countertop Design with Anti-Vibration Feet', 'Smooth SS Finish for Rapid Washing'],
                'technical_specifications' => ['Cutting Discs' => '6 Interchangeable Blades Included', 'Throughput' => '150 – 500 kg/h', 'Feed Chute' => 'Large Cylindrical Gravity Hopper', 'Power' => 'Single Phase 220V', 'Material' => 'SS-304 Food Grade'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Tabletop Slicer Model',
                        'specifications' => ['Capacity' => '150 – 300 kg/h', 'Power' => '0.75 kW / 220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'High-Capacity Floor Stand Slicer',
                        'specifications' => ['Capacity' => '300 – 600 kg/h', 'Power' => '1.5 kW / 415V', 'Material' => 'SS-304'],
                    ],
                ],
                'sort_order' => 21,
                'image' => 'industrial_slicer.png',
            ],
            [
                'name' => 'Do-Ryt Automatic Pulverizer',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Fully automatic high-speed pulverizer with stainless steel feed hopper, rotating beaters, interchangeable perforated screens, and collection drum.',
                'full_description' => '<p>The DO-RYT Fully Automatic Pulverizer is designed for micro-fine pulverization of grains, spices, dry fruits, herbs, and agro-minerals. Equipped with a wide-mouth SS conical feed hopper, high-speed rotary beating blades, dynamic cylindrical grinding chamber with quick-change perforated sizing screens, and a sealed bottom collection drum on lockable castor wheels.</p><p>Ensures minimal heat rise during grinding to preserve volatile aromatic oils in spices and active botanicals.</p>',
                'features' => ['Fully Automatic Continuous Milling', 'High-Speed Balanced Rotor with Beater Blades', 'Interchangeable Fine/Coarse Mesh Screens', 'Dedicated SS Drum Collector with Tight Clamp', 'Locking Castor Base for Easy Movement', 'Low Heat Generation for Spice Quality'],
                'technical_specifications' => ['Milling Chamber' => 'High-Speed Rotary Rotor', 'Mesh Output' => '30 to 200 Mesh', 'Capacity' => '50 – 300 kg/h', 'Collection Drum' => 'SS-304 Removable Container', 'Motor' => '3 HP – 10 HP Heavy Duty', 'MOC' => 'Complete Stainless Steel'],
                'is_featured' => true,
                'variants' => [
                    [
                        'name' => 'Standard Automatic Pulverizer (5 HP)',
                        'specifications' => ['Capacity' => '50 – 100 kg/h', 'Power' => '5 HP / 415V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Heavy Duty Industrial Pulverizer (10 HP)',
                        'specifications' => ['Capacity' => '150 – 300 kg/h', 'Power' => '10 HP / 415V', 'Material' => 'SS-304'],
                    ],
                ],
                'sort_order' => 22,
                'image' => 'automatic_pulverizer.png',
            ],
            [
                'name' => 'Cutting Machines',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Multi-purpose industrial cutting machines for dicing, shredding, and chopping of various food and non-food materials.',
                'full_description' => 'Versatile cutting machines designed for high-volume dicing, strip cutting, shredding, and granulating of vegetables, fruits, meat, and industrial materials. Interchangeable blade sets enable quick product changeovers.',
                'features' => ['Interchangeable Blade Sets', 'Dice / Strip / Shred / Chop Modes', 'Continuous High-Volume Feed', 'Safety Interlock System'],
                'technical_specifications' => ['Cut Size' => '5 – 50 mm', 'Capacity' => '300 – 5000 kg/h', 'Power' => '3 – 25 kW'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 23,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'Do-Ryt Vibro Sifter',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Precision gyratory vibratory sifter with multi-deck stainless steel classification screens, high-tension suspension springs, and directional discharge chute.',
                'full_description' => '<p>The DO-RYT Vibro Sifter is an essential classification machine for food powders, pharmaceutical granules, chemical compounds, and spices. Utilizing a high-frequency vibration motor suspended on heavy-duty coil springs, it provides 3D gyratory motion for rapid separation, de-dusting, and grading with zero mesh blinding.</p><p>Features sanitary quick-release band clamps for screen replacement in under 2 minutes.</p>',
                'features' => ['Gyratory 3D Vibratory Separation', 'Quick-Release Clamp Rings for Instant Screen Change', 'High-Tension Steel Springs for Isolated Vibration', 'Tangential Continuous Discharge Spout', 'Heavy-Duty Base with Castor Wheels', 'Dust-Tight Top Cover with Inspection Port'],
                'technical_specifications' => ['Diameter' => '600 mm – 1200 mm', 'Decks' => 'Single / Double Deck', 'Screen Mesh' => '10 to 400 Mesh Sizing', 'MOC' => 'Contact Parts SS-316L / SS-304', 'Vibration Motor' => '0.5 HP – 2.0 HP TEFC', 'Portability' => 'Castor Wheels Mounted'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Single Deck 24" (600 mm)',
                        'specifications' => ['Diameter' => '600 mm', 'Power' => '0.5 HP', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Double Deck 36" (900 mm)',
                        'specifications' => ['Diameter' => '900 mm', 'Power' => '1.0 HP', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 24,
                'image' => 'vibro_sifter.png',
            ],
            [
                'name' => 'Packaging Machines',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Automated packaging and sealing machinery for form-fill-seal, vacuum packaging, and weighing applications.',
                'full_description' => 'Complete range of packaging machinery including vertical and horizontal form-fill-seal machines, vacuum chambers, tray sealers, and multi-head weighers. Integrates easily with upstream processing lines for end-to-end automation.',
                'features' => ['VFFS / HFFS Configurations', 'Vacuum & MAP Packaging', 'Multi-Head Weighing Integration', 'Servo-Driven Precision'],
                'technical_specifications' => ['Packaging Speed' => '30 – 120 packs/min', 'Bag Size' => '50 – 500 mm width', 'Sealing' => 'Heat / Impulse / Vacuum'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 25,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
            [
                'name' => 'SS-304 Blanching Tank with Basket',
                'category_id' => $processCat->id,
                'short_description' => 'Industrial stainless steel blanching tank with motorized basket hoist, steam inlet control valve, digital temperature/timer panel, and bottom drain outlet.',
                'full_description' => '<p>The DO-RYT Blanching Tank is engineered for precise thermal processing and enzyme deactivation in fruits, vegetables, and agro commodities prior to drying or freezing. Features an integrated motorized basket hoist for effortless dipping and retrieval, SS perforated product basket, steam injection inlet with manual/pneumatic valve, digital PID temperature controller with batch timer, and heavy-duty sanitary drain outlet.</p><p>Ensures consistent enzyme inactivation and preserves the crisp texture and natural pigments of fruits and vegetables.</p>',
                'features' => ['Electric / Manual Basket Hoist System', 'Heavy-Duty SS Perforated Product Basket', 'Steam Inlet with Precision Control Valve', 'Digital Controller with Temperature & Batch Timer', 'Bottom Drain Valve for Rapid Discharge', 'Rigid Stainless Steel Frame Support'],
                'technical_specifications' => ['MOC' => 'SS-304 Sanitary Food-Grade', 'Heating Medium' => 'Steam / Electrical Immersion', 'Temperature Range' => 'Up to 100°C Controlled', 'Basket Capacity' => '100 – 500 kg/batch', 'Drain Valve' => 'Sanitary Ball Valve', 'Hoist Capacity' => 'Up to 250 kg'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => '250L Blanching Tank with Hoist',
                        'specifications' => ['Capacity' => '250 L', 'Heating' => 'Steam / Electric', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => '500L Industrial Blanching System',
                        'specifications' => ['Capacity' => '500 L', 'Heating' => 'Steam Injection', 'Material' => 'SS-304'],
                    ],
                ],
                'sort_order' => 26,
                'image' => 'blanching_tank_with_basket.png',
            ],
            [
                'name' => 'Do-Ryt Ribbon Blender',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Industrial U-trough ribbon blender with dual helical agitator, heavy-duty gear reducer, and robust stainless steel structural support frame.',
                'full_description' => '<p>The DO-RYT Ribbon Blender delivers high-efficiency, homogeneous blending of dry powders, spices, premixes, and granules. Features a precision-engineered U-shaped mixing trough, contra-flow double helical ribbon agitator, direct-coupled motor with heavy-duty gear reducer, safety-interlocked top lid, and heavy-duty square-tube support structure.</p><p>Provides thorough convective and diffusive blending action, achieving batch homogeneity in under 10 minutes.</p>',
                'features' => ['Double Helical Contra-Flow Ribbon Agitator', 'High-Torque Reduction Gearbox Drive', 'Heavy-Duty SS-304 Structural Tube Stand', 'Full-Length Hinged Top Cover with Safety Grid', 'Pneumatic / Manual Bottom Center Discharge', 'Sanitary Shaft Seals with Air Purge Option'],
                'technical_specifications' => ['Capacity' => '100 L to 3000 L', 'Blending Time' => '5 – 15 minutes per batch', 'Homogeneity' => '99%+ Coefficient of Variation', 'Drive' => 'Heavy-Duty Motor with Gear Reducer', 'MOC' => 'SS-304 / SS-316L', 'Discharge' => 'Center Flap / Knife Gate Valve'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => '500L Ribbon Blender (SS-304)',
                        'specifications' => ['Working Volume' => '500 L', 'Power' => '7.5 HP', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => '1000L Ribbon Blender (SS-316L)',
                        'specifications' => ['Working Volume' => '1000 L', 'Power' => '15 HP', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 27,
                'image' => 'ribbon_blender.png',
            ],
            [
                'name' => 'SS-304 Work Tables & Other Equipment',
                'category_id' => $ancillaryCat->id,
                'short_description' => 'Custom-fabricated stainless steel work tables, platforms, and support equipment for hygienic processing environments.',
                'full_description' => 'Fabricated to order, our SS-304 work tables and ancillary equipment include inspection tables, packing tables, platform ladders, storage racks, and trolleys. Designed for durability and hygiene in food and pharmaceutical facilities.',
                'features' => ['Custom Fabrication to Specifications', 'SS-304 / SS-316 Construction', 'Hygienic Sanitary Design', 'Adjustable Height Options'],
                'technical_specifications' => ['Material' => 'SS-304 / SS-316', 'Surface Finish' => '180 – 400 Grit Matte', 'Load Capacity' => 'Up to 500 kg'],
                'is_featured' => false,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
                'sort_order' => 28,
                'image' => 'cat_processing_equip_1783126158752.png',
            ],
        ];

        foreach ($products as $prod) {
            $image = $prod['image'] ?? null;
            $gallery = $prod['gallery'] ?? [];
            unset($prod['image'], $prod['gallery']);

            $slug = Str::slug($prod['name']);
            $model = Product::where('slug', $slug)->orWhere('name', $prod['name'])->first();
            if (! $model) {
                $model = new Product;
            }

            $model->fill(array_merge($prod, [
                'slug' => $slug,
                'status' => ContentStatus::Published,
            ]));
            $model->save();

            if ($image && File::exists(public_path('img/'.$image))) {
                $currentMedia = $model->getFirstMedia('images');
                if (! $currentMedia || $currentMedia->file_name !== $image) {
                    $model->clearMediaCollection('images');
                    $model->addMedia(public_path('img/'.$image))
                        ->preservingOriginal()
                        ->toMediaCollection('images');
                }
            }

            foreach ($gallery as $gImg) {
                if (File::exists(public_path('img/'.$gImg))) {
                    $hasGallery = $model->getMedia('images')->contains('file_name', $gImg);
                    if (! $hasGallery) {
                        $model->addMedia(public_path('img/'.$gImg))
                            ->preservingOriginal()
                            ->toMediaCollection('images');
                    }
                }
            }
        }
    }
}
