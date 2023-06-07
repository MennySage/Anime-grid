create database animegrid;
use animegrid; 

create table usuario( 
id int auto_increment primary key, 
nome varchar(45) not null, 
email varchar(45) not null, 
senha varchar(45) not null
);
 
create table anime( 
nome varchar(45) primary key, 
studio varchar(45), 
genero text, 
diretor varchar(45)
); 

create table noticia( 
id int auto_increment primary key,
descricao text, 
data date, 
hora time, 
imagem varchar(45),
nome_anime varchar(45),
foreign key (nome_anime) references anime(nome)
);

create table favorito(
id_usuario int, 
id_noticia int,
Primary key (id_usuario, id_noticia),
Foreign key (id_usuario) references usuario(id),
Foreign key (id_noticia) references noticia(id)
);

insert into anime values
('Naruto','Studio Pierrot','Aventura,comédia dramática,fantasia','Masashi Kishimoto'),
('Pokemon','Game Freak','Aventura, fantasia','Michael Steranka'),
('One Piece','Toei Animation Co., Ltd','Shonen','Eiichiro Oda'),
('Kimetsu no Yaiba',' estúdio ufotable ','Ação,Aventura,Mistério,Demônios,Shounen,','Toshiyuki Shirai'),
('Jigokuraku','Mappa','Ação, Fantasia sombria, Suspense psicológico','Kaori Makita'),
('Dragon ball Z','Toei Animation','ação, aventura e ficção científica','Daisuke Nishio'),
('Attack on Titan','WIT Studio e MAPPA','Ação, Fantasia sombria, Pós-apocalítico','Hajime Isayama'),
('Fullmetal Alchemist','Bones','Ação, Aventura, Comédia dramática, Steampunk, Fantasia científica, Tragédia','Seinji Mizushima'),
('Boku no Hero Academia','Bones','Ação,fantasia científica,comédia dramática,super-herói','Kenji Nagasaki e Masahiro Mukai'),
('Hunter x Hunter','Nippon Animation','Ação, Aventura, Fantasia','Noriyuki Abe');

insert into noticia (descricao, data, hora,imagem, nome_anime) values
('Anime ganhará 4 novos episódios inéditos:
O site oficial do anime de Naruto anunciou nesta quinta-feira (9) que o mesmo receberá quatro novos episódios inéditos a partir de setembro para comemorar seu 20º aniversário.','2023-03-09','20:30:10','noticia1.png','Naruto'),
('Pokémon Horizons receberá um mangá Shoujo:
A edição de maio da revista Ciao da Shogakukan anunciou nesta segunda-feira que Kahori Orito lançará um novo mangá baseado em Liko, a protagonista feminina do novo anime Pokémon Horizons.','2023-04-03','11:25:40','noticia2.png','Pokemon'),
('Mensagem escondida dos animadores é revelada pelos fãs:
 episódio 1062 de One Piece chamou muita atenção por fazer uma incrível adaptação e animação para a luta de Zoro e King. Além disso, os animadores da Toei Animation também esconderam uma mensagem secreta e hilária nesse episódio escrita em árabe "I love Pasta".','2023-05-31','14:00:00','noticia3.png','One Piece'),
('Mitsuri Kanroji recebe vídeo comemorativo do seu aniversário:
Mitsuri Kanroji de Demon Slayer: Kimetsu no Yaiba fez aniversário nesta quinta-feira (dia 1 de junho), e a Shonen Jump lançou um vídeo especial para comemorar a ocasião. O vídeo chamou bastante atenção dos fãs da Hashira do Amor, já que ela está sendo uma das personagens principais na nova temporada do anime.','2023-06-02','10:00:50','noticia4.png','Kimetsu no Yaiba'),
('Anime ganha novo teaser e imagem:
O evento Jump Festa ’22 revelou um novo teaser e uma nova imagem com o visual do anime Hell’s Paradise: Jigokuraku.','2021-12-19','15:22:10','noticia5.png','Jigokuraku'),
('Budokai Tenkaichi – Novo jogo da franquia é anunciado!:
Um novo jogo da franquia Dragon Ball Z: Budokai Tenkaichi está em produção, a Bandai Namco Entertainment divulgou essa informação através de um vídeo durante divulgado o evento Dragon Ball Games Battle Hour 2023.','2023-03-06','12:50:00','noticia6.png','Dragon ball Z'),
('Attack on Titan – Americana usa IA para criar marido inspirado em Eren Yeager :
Uma americana de Nova York chamada Rosanna Ramos criou um “marido” para ela inspirado no protagonista de Attack on Titan, Eren Yeager. Usando o aplicativo de inteligência artificial, Replika, ela criou o seu modelo ideal como marido dos sonhos.','2023-06-05','08:30:00','noticia7.png','Attack on Titan'),
('Mangá da autora de Fullmetal Alchemist ganha adaptação para anime:
Foi anunciado que o mangá Hyakushou Kizoku ( The Peasant Noble ) da autora Hiromu Arakawa ( Fullmetal Alchemist ) vai ganhar adaptação para anime. De acordo com informações, o anúncio chegou durante um evento de exibição do mangá realizado na Universidade de Agricultura de Tóquio.','2022-10-27','14:40:08','noticia8.png','Fullmetal Alchemist'),
('Anime ganha 7ª temporada:
É oficial, o anime Boku no Hero Academia ( My Hero Academia ) teve sua 7ª temporada divulgada. De acordo com informações que chegaram junto com a notícia, um novo teaser que detalha a novidade.','2023-03-25','22:10:21','noticia9.png','Boku no Hero Academia'),
('Site indica que o mangá irá ser cancelado em breve:
Uma recente atualização do site Weekly Shonen Jump sugere que o mangá de Hunter x Hunter do autor Yoshihiro Togashi pode ter sido cancelado. De acordo com o site oficial da revista, o mangá de Hunter X Hunter migrou de categoria, de obra em “serialização” passando para a categoria de “serialização arquivada”.','2023-02-19','13:50:00','noticia10.png','Hunter x Hunter');


create user 'AnimeGrid'@'localhost' identified by 'AnimeGrid';
show grants for 'AnimeGrid'@'localhost';
grant all on animegrid to 'AnimeGrid'@'localhost';

create view anime_noticia as select a.nome, a.studio, a.genero, a.diretor, n.descricao, n.data, n.hora
from anime as a inner join noticia as n on n.nome_anime = a.nome group by a.nome;

DELIMITER $
create trigger aumentar_contagem_favoritos
after insert on favorito
FOR EACH ROW
BEGIN
    update noticia
    set totalfavorito = totalfavorito + 1
    where id = new.id_noticia;
end $

create trigger diminuir_contagem_favoritos
before delete on favorito
FOR EACH ROW
BEGIN    
	update noticia 
    set totalfavorito = case
	when totalfavorito > 0 then totalfavorito - 1 
	else 0 end
	where id = old.id_noticia;
end $
DELIMITER ;


DELIMITER $
create function TotalUsuarios()
  returns int
  deterministic
  BEGIN
    declare total int;
    select COUNT(*) into total from usuario;
    return total;
  end $
DELIMITER ;

DELIMITER $
create procedure noticias_do_anime(p_nome_anime VARCHAR(45))
BEGIN
  select id, descricao, data, hora, imagem
  from noticia
  where nome_anime = p_nome_anime;
END $
DELIMITER ;
