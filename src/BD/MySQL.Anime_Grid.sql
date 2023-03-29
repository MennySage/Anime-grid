create database animegrid;
use animegrid; 

create table usuario( 
id int auto_increment primary key, 
nome varchar(45) not null, 
email varchar(45) not null, 
senha varchar(45) not null,
usuario_padrao boolean,
administrador boolean
);
 
create table anime( 
nome varchar(45) primary key, 
studio varchar(45), 
genero varchar(45), 
diretor varchar(45)
); 


create table noticia( 
id int auto_increment primary key, descricao text, 
data date, 
hora time, 
duracao varchar (45), 
imagem varchar(45),
Id_usuario int,
nome_anime varchar(45),
foreign key (id_usuario) references usuario(id),
foreign key (nome_anime) references anime(nome)
); 

create table comentario( 
likes varchar(45), 
deslikes varchar(45), 
comentario text,
Id_usuario int,
Id_noticia int,
Foreign key(id_usuario) references usuario(id),
Foreign key(id_noticia) references noticia(id)
);

create table favorito(
id_usuario int, 
nome_anime varchar(45),
Primary key (id_usuario, nome_anime),
Foreign key (id_usuario) references usuario(id),
Foreign key (nome_anime) references anime(nome)
);