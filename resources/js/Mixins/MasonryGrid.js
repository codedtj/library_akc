import imagesLoaded from 'vue-images-loaded';

export default {
    name: 'MasonryGrid',
    directives:{
        imagesLoaded
    },
    mounted() {
        this.resizeAllGridItems();
        window.addEventListener('resize', this.resizeAllGridItems)

        // let allItems =  document.querySelector('img');
        // for (let x = 0; x < allItems.length; x++) {
        //     imagesLoaded(allItems[x], this.resizeInstance);
        // }
    },
    methods: {
        resizeGridItem(item) {
            let grid = document.getElementsByClassName("masonry-grid")[0];
            let rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
            let rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap'));
            let rowSpan = Math.ceil((item.querySelector('.content').getBoundingClientRect().height + rowGap) / (rowHeight + rowGap));
            item.style.gridRowEnd = "span " + rowSpan;
        },
        resizeAllGridItems() {
            let allItems = document.getElementsByClassName("item");
            for (let x = 0; x < allItems.length; x++) {
                this.resizeGridItem(allItems[x]);
            }
        },
        resizeInstance(instance) {
            let item = instance.elements[0];
            this.resizeGridItem(item);
        }
    }
}
