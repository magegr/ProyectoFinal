import { Routes } from '@angular/router';
import { GafaGraduada } from './views/gafa-graduada/gafa-graduada';
import { GafaSol } from './views/gafa-sol/gafa-sol';
import { Lentillas } from './views/lentillas/lentillas';
import { Index } from './views/index';
import { Accesorios } from './views/accesorios/accesorios';
import { SaludVisual } from './views/salud-visual/salud-visual';

export const routes: Routes = [
    { path: '', redirectTo: 'inicio', pathMatch: 'full' },
    { path: 'ulleres-de-sol', component: GafaSol },
    { path: 'ulleres-graduades', component: GafaGraduada },
    { path: 'llentilles', component: Lentillas },
    { path: 'inicio', component: Index },
    { path: 'accesoris', component: Accesorios },
    { path: 'salut-visual', component: SaludVisual },
];
