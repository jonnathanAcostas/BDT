import React from 'react'
import { Grid,Paper, Avatar, TextField, Button, Typography } from '@material-ui/core'
import LockOutlinedIcon from '@material-ui/icons/LockOutlined';
import { Link, NavLink } from "react-router-dom";
import {useState} from 'react';
import axios from 'axios';
 
const Signup=()=>{
 
    const paperStyle={padding :20,height:'70vh',width:280, margin:"20px auto"}
    const avatarStyle={backgroundColor:'#3370bd'}
    const btnstyle={margin:'8px 0'}
 
    const[errors,setErrors] = useState('');
    const [user, setUser] = useState({
        name: "",
        lastname:"",
        email: "",
        phonenumber:"",
        password:""
      });
      
      const {name,lastname, email,phonenumber, password} = user;
      const onInputChange = e => {
        setUser({ ...user, [e.target.name]: e.target.value });
      };
 
   async function  signup()
       {
        console.log('usuario', user);
        let result = await axios.post("http://localhost:8000/api/register",user);
         
        setErrors('Registration Successful')
        setUser({name:"",lastname:"", email:"",phonenumber:"", password:""}) // To Clear all fields
 
        }  
     
    return(
        <Grid>
            <Paper elevation={10} style={paperStyle}>
                <Grid align='center'>
                     <Avatar style={avatarStyle}><LockOutlinedIcon/></Avatar>
                    <h2>Registro</h2>
                    <h3 style={{color:"green"}}>{errors}</h3>
                </Grid>
                
                <TextField label='Nombre' name="name" value={name} onChange={e => onInputChange(e)} placeholder='Nombre' type='text' fullWidth required/>
                <TextField label='Apellido' name="lastname" value={lastname} onChange={e => onInputChange(e)} placeholder='Apellido' type='text' fullWidth required/>
                <TextField label='Email'  name="email" value={email}  onChange={e => onInputChange(e)} placeholder='Email' type='text' fullWidth required/>
                <TextField label='Teléfono' name="phonenumber" value={phonenumber} onChange={e => onInputChange(e)} placeholder='Teléfono' type='text' fullWidth required/>
                <TextField label='Password'  name="password" value={password}  onChange={e => onInputChange(e)} placeholder=' password' type='text' fullWidth required/>
             
                <Button type='submit' onClick={signup} color='primary' variant="contained" style={btnstyle} fullWidth>Singup</Button>
              
                <Typography>Ingrese aqui 
                   <NavLink to="/">
                       <span style={{marginLeft:"4px"}}>Login</span>
                  </NavLink>
                </Typography>
            </Paper>
        </Grid>
    )
}
 
export default Signup