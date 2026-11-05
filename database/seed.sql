-- Seed Data for KHIZU Fine Stationery

-- Categories
INSERT INTO categories (id, name, slug, description) VALUES
(1, 'Hardcover Registers', 'registers', 'Executive casebound thread-sewn archival registers for students and professionals.'),
(2, 'Spiral Notebooks', 'spiral', 'Durable twin-wire bound journals with tear-resistant micro-perforated sheets.'),
(3, 'Executive Leather', 'executive', 'Top-grain vegan and bonded leather journals with gilded paper blocks.'),
(4, 'Calligraphy & Art', 'art', 'Heavy grammage fountain pen friendly paper blocks for drafting and ink work.');

-- Products
INSERT INTO products (id, category_id, title, slug, sku, tagline, price, compare_price, stock, page_count, paper_gsm, binding, ruling_options, description, features, image_url, gallery_images, badge, is_featured, status) VALUES
(1, 1, 'KHIZU Executive Register (200 Pages)', 'khizu-executive-register-200-pages', 'KHZ-REG-200', 'Precision Thread Sewn Archival Hardcover', 450.00, 520.00, 85, '200 Pages', '80 GSM', 'Casebound Thread Sewn',
'["Single Line / Ruled", "Four Line (English)", "Grid / Math Squared", "Unruled / Plain"]',
'Engineered for long-lasting academic notes, boardroom minutes, and archival keeping. The KHIZU Executive Register combines 80 GSM ultra-smooth woodfree paper with durable spine threading that lays completely flat at 180 degrees. Includes a student credential directory, date stamps, and water-resistant protective lamination.',
'["Zero Bleed-through with Fountain & Gel Pens", "180-Degree True Lay-Flat Open Binding", "Foil-Stamped Luxury Cover Finish", "Integrated Ribbon Bookmark & Index Ledger"]',
'https://lh3.googleusercontent.com/aida-public/AB6AXuBWYwtqBYXf5lgijDcLvtkuELPAJVvjkFO0zH55nCZkjJC6CoTAvB8S7bl87ML4I76CXHleZbYp3kawyOzG9m8KdL0ypWAmDvGHfqqlyWBMwzOYpDy_0Xp7qwL4dlmSjU_RlotNQUTCoN6XdSjaSBMBuahWInNoO7ZV38BY3qNXoPjK-k0BBqAdRKILntNqTLhBWsassKeNTc6vZI8tFUyDS56ISdpgJCVg3dFDcGEHnYgROWSSBaB2',
'["https://lh3.googleusercontent.com/aida-public/AB6AXuBWYwtqBYXf5lgijDcLvtkuELPAJVvjkFO0zH55nCZkjJC6CoTAvB8S7bl87ML4I76CXHleZbYp3kawyOzG9m8KdL0ypWAmDvGHfqqlyWBMwzOYpDy_0Xp7qwL4dlmSjU_RlotNQUTCoN6XdSjaSBMBuahWInNoO7ZV38BY3qNXoPjK-k0BBqAdRKILntNqTLhBWsassKeNTc6vZI8tFUyDS56ISdpgJCVg3dFDcGEHnYgROWSSBaB2", "https://lh3.googleusercontent.com/aida-public/AB6AXuBEVXUwdnqFc0U8f0ncPriey5ifIOo2rAfheSaG3_VuWqIrQCdcq2V2LhX8L09E0w7hdr6QiA_Qy3dcPvz8Uz4RBDntdDWA-FUinFzTW3f3aYKGLf0BfynFfqEb0YowSs2cyYfdBaV1vHvrR3MSKPxOyCFMqccit_HOglaaS70xQPy9P69AvbjnH6ZY9FDb52JxTP8yHkCOp6nX8gzcR54Mez_D1-YbWiIe8kRwGThgQWbthLEnnHjA", "https://lh3.googleusercontent.com/aida-public/AB6AXuBjUQPl1iFdccV6oNLOkdks1zGeIXkwiDOWxLBnH-cL8jLd9hM6aqBttZB_44sN5aArMrVOOHucz1_zivdWPMQen1dXS8ykDr8BQNSK7EZHDZKG5TQEbpabDJrPYWVUmK25jiaJsJiUVQnJZ2I6ndG3e6I_rsHGvqu2FCk5xWdCnvWuan1inVr97KU1dei0CMVbjaTTYAorghsMghBimgzGKwFgYQq9x3w5AQB6VIPlRWZ6-OjJCcAr", "https://lh3.googleusercontent.com/aida-public/AB6AXuBtUn5pYUzxcn3GZ55VlcGBHibGPQ38bwnWcJQH7YpjLYDCcQr6Oncih1JnQho9ax9DEHxQATkqpbUh7DRivmXAOExkPmI55-M6Cz1szbRm_e0tyMmGoaKRBCm_B-KA7w-Ejc7QOSqv9ysX2iMFKaVLtRzzmKwRgFmAYbY3c_X_s_Cfm8UltJkJ-D5-aEfAsLIZFKt4TvEpJ9b2aHU3SHd6MopDik85v_X3RuQg-FAEj2HtChYl-isr"]',
'Bestseller', 1, 'in_stock'),

(2, 2, 'KHIZU Spiral Pro Drafting Pad (120 Pages)', 'khizu-spiral-pro-drafting-pad', 'KHZ-SPR-120', 'Twin-Ring Reinforced Matte Cover Notebook', 220.00, 260.00, 140, '120 Pages', '75 GSM', 'Twin Wire Binding',
'["Single Line / Ruled", "Dot Grid", "Unruled / Plain"]',
'Crafted for fast-paced lectures and creative ideation. Features an impact-resistant polymer front and rear cover with double brass spiral rings that prevent page snagging.',
'["Micro-perforated Easy-Tear Edges", "Sturdy Polymer Backing for On-the-go Note-taking", "Quick Reference Conversions on Inner Flap"]',
'https://lh3.googleusercontent.com/aida-public/AB6AXuBEVXUwdnqFc0U8f0ncPriey5ifIOo2rAfheSaG3_VuWqIrQCdcq2V2LhX8L09E0w7hdr6QiA_Qy3dcPvz8Uz4RBDntdDWA-FUinFzTW3f3aYKGLf0BfynFfqEb0YowSs2cyYfdBaV1vHvrR3MSKPxOyCFMqccit_HOglaaS70xQPy9P69AvbjnH6ZY9FDb52JxTP8yHkCOp6nX8gzcR54Mez_D1-YbWiIe8kRwGThgQWbthLEnnHjA',
'["https://lh3.googleusercontent.com/aida-public/AB6AXuBEVXUwdnqFc0U8f0ncPriey5ifIOo2rAfheSaG3_VuWqIrQCdcq2V2LhX8L09E0w7hdr6QiA_Qy3dcPvz8Uz4RBDntdDWA-FUinFzTW3f3aYKGLf0BfynFfqEb0YowSs2cyYfdBaV1vHvrR3MSKPxOyCFMqccit_HOglaaS70xQPy9P69AvbjnH6ZY9FDb52JxTP8yHkCOp6nX8gzcR54Mez_D1-YbWiIe8kRwGThgQWbthLEnnHjA"]',
'Popular', 1, 'in_stock'),

(3, 1, 'KHIZU Heritage Hardcover Ledger (300 Pages)', 'khizu-heritage-hardcover-ledger-300-pages', 'KHZ-LED-300', 'Heavyweight Ledger Book with Gilded Headbands', 680.00, 750.00, 40, '300 Pages', '90 GSM', 'Section Sewn Casebound',
'["Double Column Ruled", "Single Line / Ruled", "Numbered Accounts"]',
'The flagship volume for accounting, archival master logging, and executive record keeping. Featuring 90 GSM heavyweight bond paper that withstands the most demanding inks.',
'["Gilded Edge Foiling", "Heavy Buckram Fabric Spine Accent", "Built-in Dual Bookmark Ribbons"]',
'https://lh3.googleusercontent.com/aida-public/AB6AXuBjUQPl1iFdccV6oNLOkdks1zGeIXkwiDOWxLBnH-cL8jLd9hM6aqBttZB_44sN5aArMrVOOHucz1_zivdWPMQen1dXS8ykDr8BQNSK7EZHDZKG5TQEbpabDJrPYWVUmK25jiaJsJiUVQnJZ2I6ndG3e6I_rsHGvqu2FCk5xWdCnvWuan1inVr97KU1dei0CMVbjaTTYAorghsMghBimgzGKwFgYQq9x3w5AQB6VIPlRWZ6-OjJCcAr',
'["https://lh3.googleusercontent.com/aida-public/AB6AXuBjUQPl1iFdccV6oNLOkdks1zGeIXkwiDOWxLBnH-cL8jLd9hM6aqBttZB_44sN5aArMrVOOHucz1_zivdWPMQen1dXS8ykDr8BQNSK7EZHDZKG5TQEbpabDJrPYWVUmK25jiaJsJiUVQnJZ2I6ndG3e6I_rsHGvqu2FCk5xWdCnvWuan1inVr97KU1dei0CMVbjaTTYAorghsMghBimgzGKwFgYQq9x3w5AQB6VIPlRWZ6-OjJCcAr"]',
'Executive Choice', 1, 'in_stock'),

(4, 3, 'KHIZU Midnight Scholar Journal (160 Pages)', 'khizu-midnight-scholar-journal', 'KHZ-SCH-160', 'Deep Royal Navy Soft-Touch Embossed Cover', 380.00, 450.00, 65, '160 Pages', '80 GSM', 'Flexi-Bound',
'["Dotted Matrix 5mm", "Single Line / Ruled", "Blank / Sketch"]',
'Sleek, pocketable, and styled in KHIZU signature midnight indigo. Comes equipped with an elastic enclosure band and an expandable rear document pocket.',
'["Expandable Inner Gusseted Pocket", "Elastic Closure Band", "Acid-free pH Neutral Paper"]',
'https://lh3.googleusercontent.com/aida-public/AB6AXuBtUn5pYUzxcn3GZ55VlcGBHibGPQ38bwnWcJQH7YpjLYDCcQr6Oncih1JnQho9ax9DEHxQATkqpbUh7DRivmXAOExkPmI55-M6Cz1szbRm_e0tyMmGoaKRBCm_B-KA7w-Ejc7QOSqv9ysX2iMFKaVLtRzzmKwRgFmAYbY3c_X_s_Cfm8UltJkJ-D5-aEfAsLIZFKt4TvEpJ9b2aHU3SHd6MopDik85v_X3RuQg-FAEj2HtChYl-isr',
'["https://lh3.googleusercontent.com/aida-public/AB6AXuBtUn5pYUzxcn3GZ55VlcGBHibGPQ38bwnWcJQH7YpjLYDCcQr6Oncih1JnQho9ax9DEHxQATkqpbUh7DRivmXAOExkPmI55-M6Cz1szbRm_e0tyMmGoaKRBCm_B-KA7w-Ejc7QOSqv9ysX2iMFKaVLtRzzmKwRgFmAYbY3c_X_s_Cfm8UltJkJ-D5-aEfAsLIZFKt4TvEpJ9b2aHU3SHd6MopDik85v_X3RuQg-FAEj2HtChYl-isr"]',
'New Arrival', 1, 'in_stock'),

(5, 4, 'KHIZU Calligrapher Artist Pad (100 Pages)', 'khizu-calligrapher-artist-pad', 'KHZ-CAL-100', '120 GSM Heavyweight Smooth Bristol Finish', 550.00, 620.00, 30, '100 Pages', '120 GSM', 'Top Glued Tear-off Block',
'["Plain / Blank", "Slanted Calligraphy Guide 55 deg"]',
'Designed for ink aficionados, dip pens, and calligraphy enthusiasts. Tested with iron gall and pigment inks with absolute zero feathering.',
'["Ultra Heavy 120 GSM Stock", "Zero Ink Feathering or Ghosting", "Heavy Chipboard Backing"]',
'https://lh3.googleusercontent.com/aida-public/AB6AXuBWYwtqBYXf5lgijDcLvtkuELPAJVvjkFO0zH55nCZkjJC6CoTAvB8S7bl87ML4I76CXHleZbYp3kawyOzG9m8KdL0ypWAmDvGHfqqlyWBMwzOYpDy_0Xp7qwL4dlmSjU_RlotNQUTCoN6XdSjaSBMBuahWInNoO7ZV38BY3qNXoPjK-k0BBqAdRKILntNqTLhBWsassKeNTc6vZI8tFUyDS56ISdpgJCVg3dFDcGEHnYgROWSSBaB2',
'["https://lh3.googleusercontent.com/aida-public/AB6AXuBWYwtqBYXf5lgijDcLvtkuELPAJVvjkFO0zH55nCZkjJC6CoTAvB8S7bl87ML4I76CXHleZbYp3kawyOzG9m8KdL0ypWAmDvGHfqqlyWBMwzOYpDy_0Xp7qwL4dlmSjU_RlotNQUTCoN6XdSjaSBMBuahWInNoO7ZV38BY3qNXoPjK-k0BBqAdRKILntNqTLhBWsassKeNTc6vZI8tFUyDS56ISdpgJCVg3dFDcGEHnYgROWSSBaB2"]',
'Artisan', 0, 'in_stock'),

(6, 2, 'KHIZU Academic Dual-Subject Notebook', 'khizu-academic-dual-subject-notebook', 'KHZ-ACA-240', 'Color Coded Index Tabs with Poly Divider', 340.00, 390.00, 110, '240 Pages', '70 GSM', 'Twin Wire Binding',
'["Single Line / Ruled"]',
'Two subjects neatly organized into one rigid notebook. Polypropylene dividers with repositionable tab stickers make campus note-taking seamless.',
'["Durable Polypropylene Colored Dividers", "Double Spiral Binding Won''t Crush", "Includes Metric Conversion Tables"]',
'https://lh3.googleusercontent.com/aida-public/AB6AXuBEVXUwdnqFc0U8f0ncPriey5ifIOo2rAfheSaG3_VuWqIrQCdcq2V2LhX8L09E0w7hdr6QiA_Qy3dcPvz8Uz4RBDntdDWA-FUinFzTW3f3aYKGLf0BfynFfqEb0YowSs2cyYfdBaV1vHvrR3MSKPxOyCFMqccit_HOglaaS70xQPy9P69AvbjnH6ZY9FDb52JxTP8yHkCOp6nX8gzcR54Mez_D1-YbWiIe8kRwGThgQWbthLEnnHjA',
'["https://lh3.googleusercontent.com/aida-public/AB6AXuBEVXUwdnqFc0U8f0ncPriey5ifIOo2rAfheSaG3_VuWqIrQCdcq2V2LhX8L09E0w7hdr6QiA_Qy3dcPvz8Uz4RBDntdDWA-FUinFzTW3f3aYKGLf0BfynFfqEb0YowSs2cyYfdBaV1vHvrR3MSKPxOyCFMqccit_HOglaaS70xQPy9P69AvbjnH6ZY9FDb52JxTP8yHkCOp6nX8gzcR54Mez_D1-YbWiIe8kRwGThgQWbthLEnnHjA"]',
'Value Pack', 0, 'in_stock');

-- Initial Reviews
INSERT INTO reviews (product_id, customer_name, rating, comment, verified_purchase) VALUES
(1, 'Hassan Tariq, Lahore', 5, 'The paper quality is exceptional! Using my Lamy fountain pen on this 200-page register gives zero feathering or bleed through. Outstanding Pakistani craftsmanship.', 1),
(1, 'Dr. Ayesha Malik, Islamabad', 5, 'Ordered 10 registers for our research department. The binding lies completely flat, which makes long writing hours very comfortable.', 1),
(2, 'Zainab Qureshi, Karachi', 5, 'Perfect size for university classes. Spiral wire is thick and durable unlike regular stationers.', 1);

-- Settings
INSERT INTO settings (`key`, `value`, description) VALUES
('store_name', 'KHIZU Fine Stationery', 'Storefront name'),
('store_phone', '+92 300 1234567', 'Official WhatsApp & phone number'),
('store_email', 'concierge@khizu.com', 'Official inquiries email'),
('shipping_flat_fee', '150', 'Flat Cash on Delivery shipping rate nationwide (PKR)'),
('free_shipping_threshold', '2500', 'Order amount eligible for free shipping (PKR)');
