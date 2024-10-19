import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { UsuarioDTO } from '../../../core/models/UsuarioDTO';
import { environment } from '../../../../environments/environment';


@Injectable({
  providedIn: 'root'
})
export class UsuarioService {


 BASE_URL:string = environment.apiURL + '/usuarios'
 private http:HttpClient = inject(HttpClient);


  constructor() { }

  public ObtnerTodos() : Observable<UsuarioDTO[]>{
    return this.http.get<UsuarioDTO[]>(this.BASE_URL);
  }
}
