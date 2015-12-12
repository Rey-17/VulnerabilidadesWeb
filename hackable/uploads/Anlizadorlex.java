
import java.util.regex.Matcher;
import java.io.*;
import java.util.regex.Pattern;

public class Anlizadorlex {
	
	public static void main(String[] args){
		
		/*Lectura del archivo texto.txt - la cual debe estar en la raiza del proyecto*/
		try{
			String LecturaArchivo; 
			File texto = new File("texto.txt");
		    FileReader leer = new FileReader (texto);
	        BufferedReader file = new BufferedReader(leer);
	        while((LecturaArchivo=file.readLine())!=null){
	        	System.out.println(LecturaArchivo);
	        	 
	         }
		}catch(Exception e){
	         e.printStackTrace();
	      }
		
		/*Fin de la lectura del archivo texto.txt*/
		
		
		
		
		
		String lex = ("(if|else)|([a-zA-Z]+)|([<|>|=]+)|([0-9]+)|([(|)]+)|([{|}]+)|(;)+|([?|¿|¡|$|%|&|!]+)");
		String txt = ("if (x>num) %%"
				+ "        num =(x+5);"   
				+ "   else "
				+ "        num=x;"
				+ 				"? $");
		
		
		Pattern j = Pattern.compile(lex);
		Matcher matcher = j.matcher(txt);
		
		while(matcher.find()){
			String token1 = matcher.group(1);
			if(token1 !=null){
				System.out.println(token1+"\t"+"Palabra reservada");
			}
			
			String token2 = matcher.group(2);
			if(token2 !=null){
				System.out.println(token2+"\t"+"Variable");
			}
			
			String token3 = matcher.group(3);
			if(token3 !=null){
				System.out.println(token3+"\t"+"Operador");
			}
			
			String token4 = matcher.group(4);
			if(token4 !=null){
				System.out.println(token4+"\t"+"Numero");
			}
			
			String token5 = matcher.group(5);
			if(token5 !=null){
				System.out.println(token5+"\t"+"Parentesis");
			}
			
			String token6 = matcher.group(6);
			if(token6 !=null){
				System.out.println(token6+"\t"+"llave");
			}
			
			String token7 = matcher.group(7);
			if(token7 !=null){
				System.out.println(token7+"\t"+"punto y coma");
			}
			String token8 = matcher.group(8);
			if(token8 !=null){
				System.out.println(token8+"\t"+"Error de comando");
			}
		}
			
		
	}
	

}
