import PmsIndex from './components/pms/Index';
import PmsCreate from './components/pms/Create';

export const routes = [
    {
        path: '/pms',
        name: 'PmsIndex',
        component: PmsIndex
    },
    {
        path: '/pms/create',
        name: 'PmsCreate',
        component: PmsCreate
    },
];