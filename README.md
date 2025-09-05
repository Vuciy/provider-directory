performance-focuses

    Design Decisions
        The The web app is split into components to promote reusability and maintainability:
            CategoriesList, HeaderComponent, Pagination, ProviderCard, ProviderList
        This separation allows each component to focus on a single responsibility, making it easier to test, reuse, or modify individual parts.
        Uses the Link component from @inertiajs/vue3 for client-side navigation, ensuring seamless page transitions without full reloads.
        The preserve scroll prop is included to maintain scroll position during navigation, enhancing user experience.
        Leverages Tailwind CSS for responsive, utility first styling, ensuring a consistent look and feel with minimal custom CSS.


    Performance Optimizations
        The v-if="links.length > 3" in Pagination.vue prevents rendering the entire pagination structure for datasets with only single page.
        The :key="index" in the v-for loop ensures efficient diffing during Vue’s reconciliation process, minimizing unnecessary re-renders.
        Each component is lightweight, with minimal props and computed properties, reducing the overhead of Vue’s reactivity system.
        Tailwind’s utility classes are compiled to include only the used styles, reducing the final CSS bundle size.
        The preserve-scroll prop prevents unnecessary scroll events, improving perceived performance.
        The Link component leverages Inertia.js for partial page reloads, fetching only the necessary data from the server and avoiding full page refreshes.
        Props are strictly typed (e.g., Array for links, Object for link) and marked as required, enabling early error detection and avoiding runtime issues that could slow down rendering.



    Areas for Future Enhancement
        When querying data, only index the fields needed on the frontend to improve loading time.
        Use caching systems like Redis to improve performance and reduce loading time also index frequently accessed data.
        Use responsive or compressed images optimized for mobile devices.
        Add ARIA attributes (e.g., aria-current="page" for active links, aria-disabled="true" for disabled links) to improve screen reader support.
        Ensure keyboard navigation is fully supported, particularly for the Link component, by adding focus states and tabindex where needed.
        For large datasets with many links, consider implementing lazy loading or virtual scrolling for the CategoriesList component to render only visible links, reducing initial DOM load.
        Use Vue’s v-memo directive (Vue 3.2+) to cache rendering of unchanged links during updates.
        Integrate Vue’s markRaw or shallowRef for the links prop if the array is large and static, reducing reactivity overhead.



How to run the project
    - Project is tested using MySQL.

    Commands
        - composer install
        - npm run insatll
        - php artisan migrate --seed
        - php artisan optimize
        - npm run dev      # For development
        - npm run build    # If you do not plan to edit Vue.js code /production
        - php artisan serve

    Test commands
        - php artisan test
        - npm run test:ui
        

