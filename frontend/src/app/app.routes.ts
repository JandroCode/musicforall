import { Routes } from '@angular/router';
import { UsuarioComponent } from './features/usuario/components/usuario.component';

export const routes: Routes = [
  {
    path: '',
    loadComponent: () => import('./features/usuario/components/usuario.component').then(m => m.UsuarioComponent)
},
]
