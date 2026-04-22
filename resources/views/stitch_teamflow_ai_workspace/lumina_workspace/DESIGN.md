# Design System Document: High-End Editorial SaaS Dashboard

## 1. Overview & Creative North Star: "The Architectural Curator"

The Creative North Star for this design system is **The Architectural Curator**. 

While many SaaS tools feel like rigid spreadsheets, this system treats information as a curated exhibition. We are moving away from the "boxy" nature of standard project management tools toward an editorial, airy layout that prioritizes mental clarity. 

### Breaking the Template
*   **Intentional Asymmetry:** Avoid perfectly centered grids. Use wide gutters and offset headers to create a sense of bespoke, high-end publishing.
*   **Negative Space as a Feature:** White space is not "empty"—it is a functional separator. We use generous padding to reduce cognitive load.
*   **Layered Sophistication:** We interpret the "Notion-like" request by taking its utility and wrapping it in a premium, tactile interface that feels like fine stationery meets high-end architecture.

---

## 2. Colors & Surface Philosophy

The color palette is grounded in cool, atmospheric teals (`primary`) and earth-toned accents (`tertiary`), providing a professional yet warm environment.

### The "No-Line" Rule
**Strict Mandate:** Designers are prohibited from using 1px solid borders for sectioning or layout containment. 
Structure must be achieved through:
1.  **Background Shifts:** Placing a `surface-container-low` component on a `surface` background.
2.  **Tonal Transitions:** Using the hierarchy of `surface-container` tokens to define boundaries.

### Surface Hierarchy & Nesting
Treat the UI as a series of physical layers. Nesting should follow a logical progression to indicate importance:
*   **Base Layer (`surface` / `#f5fafb`):** The canvas of the application.
*   **Secondary Layer (`surface-container-low`):** For sidebar or navigation areas.
*   **Active Layer (`surface-container-lowest` / `#ffffff`):** For the primary workspace or active "pages."
*   **Floating Layer (`surface-bright`):** Reserved for modals or popovers.

### The "Glass & Gradient" Rule
To elevate the experience, floating elements (like side-panels or context menus) should utilize **Glassmorphism**:
*   **Background:** `surface` at 70% opacity.
*   **Effect:** `backdrop-blur: 12px`.
*   **Signature Texture:** Use a subtle linear gradient on primary CTAs from `primary` (#316574) to `primary-container` (#81b4c5) at a 135-degree angle. This adds "soul" and depth to otherwise flat interactive elements.

---

## 3. Typography: Editorial Authority

We use a dual-font system to balance character with readability.

*   **Display & Headlines (Manrope):** Chosen for its geometric modernism. Used for page titles and section headers to provide a "magazine" feel.
*   **Body & Labels (Inter):** The workhorse. Inter provides exceptional legibility for dense project data and knowledge base articles.

### Typography Scale Highlights
*   **display-md (Manrope, 2.75rem):** Use for dashboard welcomes or empty-state headers.
*   **title-lg (Inter, 1.375rem):** The standard for "Page" titles within the workspace.
*   **body-md (Inter, 0.875rem):** The primary reading size for project notes and task descriptions.
*   **label-sm (Inter, 0.6875rem, Uppercase, Tracking 0.05em):** Used for metadata, tags, and small utility text.

---

## 4. Elevation & Depth

We eschew traditional "Drop Shadows" in favor of **Tonal Layering** and **Ambient Light**.

### The Layering Principle
Depth is achieved by "stacking" surface tiers. A `surface-container-lowest` card sitting on a `surface-container` background creates a natural lift. Use `rounded-xl` (1.5rem) for large containers to soften the "tech" feel.

### Ambient Shadows
If an object must float (e.g., a dragged task card), use an **Ambient Shadow**:
*   **Shadow:** `0 20px 40px -10px rgba(40, 43, 42, 0.06)`.
*   **Color:** Use a tinted version of `on-surface` rather than pure black to keep the shadow feeling integrated with the background.

### The "Ghost Border" Fallback
If a border is required for accessibility (e.g., in high-contrast needs), use a **Ghost Border**:
*   **Token:** `outline-variant` at 20% opacity. Never use 100% opaque borders.

---

## 5. Components

### Buttons
*   **Primary:** Gradient fill (`primary` to `primary-container`), `rounded-md`, white text. No shadow on rest; subtle `primary-fixed-dim` glow on hover.
*   **Secondary:** `surface-container-highest` background with `on-surface` text.
*   **Tertiary:** No background. `primary` text. Use for low-priority actions like "Cancel."

### Cards & Lists
*   **Constraint:** **No Dividers.** Separate list items using `8px` of vertical space or a subtle hover state shift to `surface-container-low`.
*   **Task Cards:** Use `surface-container-lowest` with a `lg` (1rem) corner radius. Internal padding should be a generous `1.5rem`.

### Input Fields
*   **Style:** Minimalist underline or soft-tinted box.
*   **State:** On focus, the background shifts to `surface-container-lowest` and the Ghost Border becomes `primary` at 50% opacity.

### Additional Signature Components
*   **The Breadcrumb Trail:** Use `label-md` with `on-surface-variant`. Replace the standard "/" separator with a subtle `2px` dot in `primary-fixed`.
*   **Contextual Drawer:** A side-aligned panel using the Glassmorphism rule to allow the dashboard's "airy" layout to remain visible underneath.

---

## 6. Do’s and Don’ts

### Do:
*   **Do** use asymmetrical margins (e.g., a wider left margin than right) for "Page" views to mimic an editorial layout.
*   **Do** use `tertiary` (#954a00) sparingly for warnings or high-priority notifications to maintain its visual impact.
*   **Do** prioritize "Breathing Room." If a layout feels cramped, increase the padding—never decrease the font size.

### Don’t:
*   **Don’t** use pure black (#000000) for text. Always use `on-surface` (#171d1e) for better visual comfort.
*   **Don’t** use hard-edged corners. Every element, including selection states, must use at least `sm` (0.25rem) rounding.
*   **Don’t** use "Card-in-Card" layouts with borders. If you must nest, use a background color shift (e.g., a `surface-container-high` card inside a `surface-container-low` area).