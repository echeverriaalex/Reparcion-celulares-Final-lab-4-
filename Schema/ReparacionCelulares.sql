drop database if exists reparacion_celulares;
CREATE DATABASE IF NOT EXISTS reparacion_celulares;
USE reparacion_celulares;

drop table if exists technicals;
CREATE TABLE IF NOT EXISTS technicals(
	id_technical int  auto_increment,
	userName NVARCHAR(100) NOT NULL,
    email NVARCHAR(100) NOT NULL,
    password NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_technicals primary key (id_technical)
)Engine=InnoDB;

insert into technicals (userName, email, password) 
	values 	("Alex Echeverria", "alex@alex.com", "123456"),
			("Pepe Fulano", "pepe@utn.com", "123456"),
            ("Fulano Mengano", "fula@no.com", "123456"),
            ("Bill Gates", "bill@micro.com", "9876"),
            ("Linus Torvalds", "linus@nux.com", "123456");
select * from technicals;

select * from technicals t where t.password like "123456" and (t.userName 
	like "Alex Echeverria" or t.email like "alex@alex.com");
    
select * from technicals t where t.password like "123456" and (t.userName 
	like "alex@alex.com" or t.email like "alex@alex.com");

select * from technicals t where t.password like "1456" and (t.userName 
	like "alex@alex.com" or t.email like "alex@alex.com");
    
    
drop table if exists clients;
CREATE TABLE IF NOT EXISTS clients(
	id_client INT NOT NULL auto_increment,
	nombre NVARCHAR(100) NOT NULL,
    telefono NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_clients primary key (id_client)
)Engine=InnoDB;

delete from clients;
insert into clients(nombre, telefono) 
	values 	("Leticia Ortiz", "22345342"),
			("Mia Toretto", "555333255"),
            ("Johnny Tran", "412347"),
            ("Hector El pelado", "4353453"),
			("Monica Rapida", "25654342"),
            ("Roman Pearce", "345436"),
            ("Suki Suzuki", "45332423"),
            ("Brian OConner", "43523242"),
            ("Tej Parker", "93284920"),
            ("Dominic Toretto", "67708865342"),
            ("Justin Bieber", "5464574334"),
            ("Rihanna", "23423578"),
            ("David Guetta", "21345898"),
            ("Steve Jobs", "0879879676575"),
            ("Robin Schulz", "23432554"),
            ("Ken Block", "3546587645"),
            ("Beabadoobee ", "443423456");
select * from clients;
select * from clients where id_client = 3;


drop table if exists repairstatus;
CREATE TABLE IF NOT EXISTS repairstatus(
    repairStatusId INT NOT NULL AUTO_INCREMENT,
    description NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_repairStatus PRIMARY KEY (repairStatusId)
)Engine=InnoDB;

INSERT INTO repairstatus (description)
    VALUES ('Pendiente'),('En reparacion'),('Finalizado');
select * from repairstatus;


drop table if exists repairs;
CREATE TABLE IF NOT EXISTS repairs(
    repairId INT NOT NULL auto_increment,
    repairStatusId INT NOT NULL,
    description NVARCHAR(200) NOT NULL,
    technicalId INT NOT NULL,
    clientId INT NOT NULL,
    CONSTRAINT PK_repair PRIMARY KEY (repairId)
)Engine=InnoDB;

insert into repairs (repairStatusId, description, technicalId, clientId)
	values 	(1, "Iphone 12 pro", 5, 1), 
			(2, "Iphone 11", 2, 3),
            (3, "Iphone X pro", 4, 4),
            (1, "Iphone X", 1, 2),
            (2, "Iphone 8", 2, 5),
            (3, "Iphone 7", 3, 2),
            (2, "Moto G52", 4, 10),
            (1, "Samsung s23", 5, 9),
            (2, "Samsung s22 ultra", 1, 8),
            (3, "Samsung s4 mini", 2, 17),
            (1, "Nokia 1100", 3, 7),
            (3, "Samsung Fold 4", 4, 16),
            (2, "Samsung flip 5", 5, 14);
select * from repairs;
update repairs set repairId = 9, repairStatusId =2  where(repairId = 9);
select * from repairs;





delete from repairs;
select  * from repairs;


    
select * from clients;



select r.repairId, r.description, rs.description as "estado"
	from repairs r inner join repairstatus rs where r.repairStatusId = rs.repairStatusId and r.repairId = 3;

select r.repairId, r.description, rs.description as "estado"
	from repairs r inner join repairstatus rs where r.repairStatusId = rs.repairStatusId;
   

select 
	r.repairId as "repair", 
    r.repairStatusId as "status id repair", 
    r.description as "description repair", 
    rs.repairStatusId as "status id", 
    rs.description as "description repair status" 
    from repairs r inner join repairstatus rs 
	where r.repairStatusId = rs.repairStatusId and r.repairId = 3;
    
select 
	r.repairId as "repair id", 
    r.repairStatusId as "status repair id", 
    r.description as "description repair",
    
    r.technicalId as "technical id",
    t.userName as "technical name",
    
    r.clientId as "client id",
    c.nombre as "nombre cliente",
    rs.repairStatusId as "status id", 
    rs.description as "description repair status" 
    from repairs r inner join repairstatus rs on r.repairStatusId = rs.repairStatusId
    inner join technicals t on r.technicalId = t.id_technical
    inner join clients c on c.id_client = r.clientId
    where r.repairId = 3;
    
select 
	r.repairId as "repair", 
    r.repairStatusId as "status id repair", 
    r.description as "description repair", 
    rs.repairStatusId as "status id", 
    rs.description as "description repair status" 
    from repairs r inner join repairstatus rs 
	where r.repairStatusId = rs.repairStatusId and r.repairId = 3;
    
select 
	r.repairId as "repair id", 
    r.repairStatusId as "status repair id", 
    r.description as "description repair",
    
    r.technicalId as "technical id",
    t.userName as "technical name",
    
    r.clientId as "client id",
    c.nombre as "nombre cliente",
    c.telefono,
    rs.repairStatusId as "status id", 
    rs.description as "description repair status" 
    from repairs r inner join repairstatus rs on r.repairStatusId = rs.repairStatusId
    inner join technicals t on r.technicalId = t.id_technical
    inner join clients c on c.id_client = r.clientId;

select * from clients;
 
 /* 
 delete from clients where nombre like "Roberto lencinas"; 
 update clients set nombre = "Monica Rapida" where nombre like "Monica Rapidrs";
 */

select * from clients;


    
    
    select 
                            r.repairId as "repair id", 
                            r.repairStatusId as "status repair id", 
                            r.description as "description order",
                            
                            r.technicalId as "technical id",
                            t.userName as "technical name",
                            
                            r.clientId as "client id",
                            c.nombre as "nombre cliente",
                            c.telefono,
                            
                            rs.repairStatusId as "status id", 
                            rs.description as "description order status" 
                            from repairs r inner join repairstatus rs on r.repairStatusId = rs.repairStatusId
                            inner join technicals t on r.technicalId = t.id_technical
                            inner join clients c on c.id_client = r.clientId;
    




/*********************************************************/
select 
	r.repairId as "repair id", 
	r.repairStatusId as "status repair id", 
	r.description as "description order",                            
	r.technicalId as "technical id",
	r.clientId as "client id",
	
	t.userName as "technical name",
	t.id_technical as "technical id",
	
	c.id_client as "client id",
	c.nombre as "nombre cliente",
	c.telefono as "telefono",
	
	rs.repairStatusId as "status id", 
	rs.description as "description orderstatus" 

from repairs r 
inner join repairstatus rs on r.repairStatusId = rs.repairStatusId
inner join technicals t on r.technicalId = t.id_technical
inner join clients c on c.id_client = r.clientId;



    