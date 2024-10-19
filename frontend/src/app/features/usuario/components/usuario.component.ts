import { Component, inject } from '@angular/core';
import { UsuarioService } from '../services/usuario.service';
import { UsuarioDTO } from '../../../core/models/UsuarioDTO';

@Component({
  selector: 'app-usuario',
  standalone: true,
  imports: [],
  templateUrl: './usuario.component.html',
  styleUrl: './usuario.component.css'
})
export class UsuarioComponent {


  usuarios?:UsuarioDTO[]

  private usuarioService : UsuarioService = inject(UsuarioService)


  ngOnInit() : void{
    this.ObtenerTodos();
  }


  public ObtenerTodos() : void{
    this.usuarioService.ObtnerTodos().subscribe({
      next : res =>{
        this.usuarios = res
        
      },
      error : err => console.log(err)
    })

  }

}
