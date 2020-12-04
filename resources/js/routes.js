import aboutPage from './components/front/aboutPage.vue'
import contactUs from './components/front/contactusPage.vue'
import offersPage from './components/front/offersPage.vue'
import siteMap from './components/front/siteMapPage.vue'
import valuesPage from './components/front/valuesPage.vue'

export const routes = [
    {
        path:'/about',
        component:aboutPage
    },
    {
        path:'/contact',
        component:contactUs
    },
    { 
        path:'/offers',
        component:offersPage
    },
    { 
        path:'/siteMap',
        component:siteMap
    },
    { 
        path:'/values',
        component:valuesPage
    },
]