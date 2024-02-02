import { useState } from "react";

function Login({checkLogin,errorLogin}){
 
    const[username,setUsername]=useState('');
    const[pass,setPass]=useState('');

    const handleLogin =(e) => {
        e.preventDefault();//tranh cac su kien khac bat
        const checkUser={username,pass};//username va pass nguoi dung nhap=object luu vao checkLogin
        checkLogin(checkUser);
        setUsername('');//sau khi submit thi set lai rong 
        setPass('');
        
    }
    return(
        <div>
            <form onSubmit={handleLogin} >
                <table style={{marginLeft:"auto", marginRight:"auto"}}>
                    <p >{errorLogin}</p>
        
                    <tr>
                        <td>Username</td>
                        <td><input type="text" value={username} placeholder=" " 
                        onChange={(e)=>setUsername(e.target.value)}/></td>
                    </tr>
                    <tr>
                        <td>Pass</td>
                        <td><input type="pass" value={pass} placeholder=" " 
                        onChange={(e)=>setPass(e.target.value)}/></td>
                    </tr>
                    <tr>
                        <td colSpan="2"><input type="submit" value="Login"  /></td>
                       
                        </tr>
                </table>
                    </form>
            </div>
        
    );
   
}export default Login;