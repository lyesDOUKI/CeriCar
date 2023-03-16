drop function chercherCorrespondances(varchar, varchar, varchar, varchar, integer, integer,text, integer);
create or replace function chercherCorrespondances(monDepart jabaianb.trajet.depart%TYPE, monArrivee jabaianb.trajet.arrivee%TYPE,
                                                    parcour varchar(250), mesId varchar(250), heure integer, dis integer,infotrajet text, totalHeure integer)
    returns table (nombre_escale varchar(25), cor_id varchar(250),villes varchar(250),information text, conduc varchar(250)) AS $$
declare
    monRecord record;
    monCurseur refcursor;
    verifieSiVilleParcouru varchar(25);
    verifieSiCorrespondance integer; --si plus d'un voyage
    idVoyageAsChar varchar(25);
    idRecupAsInteger integer;
    nom varchar(25);
    prenom varchar(25);
    infoConducteur varchar(200);

begin
    open monCurseur for select *
            from jabaianb.voyage as voyage
            inner join jabaianb.trajet as trajet
            on voyage.trajet = trajet.id
            where trajet.depart = monDepart
            and voyage.nbplace > 0
            order by voyage.trajet;
      loop
      fetch monCurseur INTO monRecord;
      exit when not FOUND;
      verifieSiVilleParcouru = substring(parcour, monRecord.arrivee); --si on est déja passer par là
      if(verifieSiVilleParcouru is null)then -- si on a pas parcouru la ville
             if(monRecord.arrivee = monArrivee and (monRecord.heuredepart >= heure + (monRecord.distance / 60) ) and (monRecord.distance + dis < 1440)
                and totalHeure <24 and monRecord.heuredepart < 24 ) then
                verifieSiCorrespondance = array_length(string_to_array(mesId,','),1);
                if(verifieSiCorrespondance > 1)then
                mesId := concat(mesId,monRecord.id);
                parcour := concat(parcour,monRecord.depart,'-',monRecord.arrivee,' ');
                infotrajet := concat(infotrajet,'place(s) restante(s) : ',monRecord.nbplace,' \ Prix : ',
                            monRecord.tarif,' Euro \ distance :  ',monRecord.distance,' km \ depart : ',monRecord.heuredepart ,
                    'h \ contrainte(s) : ',monRecord.contraintes,'|');
                     foreach idVoyageAsChar in array string_to_array(mesId,',')
                     loop
                         if(idVoyageAsChar <> '')then
                             select into idRecupAsInteger cast(idVoyageAsChar as DECIMAL); --convertir en integer
                             select u.nom, u.prenom  into nom,prenom
                            from jabaianb.utilisateur u inner join jabaianb.voyage v
                            on v.conducteur=u.id where v.id = idRecupAsInteger;
                            infoConducteur = concat(infoConducteur,'Nom : ','',nom,'  Prénom : ',prenom,'|');
                         end if;
                         end loop;
                nombre_escale = verifieSiCorrespondance-1;
                cor_id = mesId;
                villes = parcour;
                information = infotrajet;
                conduc = infoConducteur;

                return next ;
                end if;
         else
             if(heure = 0 and ((monRecord.distance + dis < 1440) ) and
                totalHeure <24 and monRecord.heuredepart < 24)then
                      return query select * from chercherCorrespondances(monRecord.arrivee, monArrivee,
                                                                    parcour := concat(parcour, monDepart,'-',monRecord.arrivee, ' '),
                                                                        mesId := concat(mesId,monRecord.id,','),
                                                                        heure := monRecord.heuredepart, dis:= dis + monRecord.distance,
                                                        infotrajet := concat(infotrajet,'place(s) restante(s) : ',monRecord.nbplace,' \ Prix : ',
                                                            monRecord.tarif,' Euro \ distance :  ',monRecord.distance,' km \ depart : ',
                                                            monRecord.heuredepart,'h \ contrainte(s) : ',monRecord.contraintes,'|'),
                                                            totalHeure := totalHeure+(monRecord.distance/60)
                                                            );
             else
            if((monRecord.heuredepart >= heure + (monRecord.distance / 60)) and ((monRecord.distance + dis < 1440) ) and
                totalHeure <24 and monRecord.heuredepart < 24)then
                return query select * from chercherCorrespondances(monRecord.arrivee, monArrivee,
                                                                    parcour := concat(parcour, monDepart,'-',monRecord.arrivee, ' '),
                                                                        mesId := concat(mesId,monRecord.id,','),
                                                                        heure := monRecord.heuredepart, dis:= dis + monRecord.distance,
                                                        infotrajet := concat(infotrajet,'place(s) restante(s) : ',monRecord.nbplace,' \ Prix : ',
                                                            monRecord.tarif,' Euro \ distance :  ',monRecord.distance,' km \ depart : ',
                                                            monRecord.heuredepart,'h \ contrainte(s) : ',monRecord.contraintes,'|'),
                                                            totalHeure := totalHeure+(monRecord.distance/60)
                                                            );
            end if;
            end if;
          end if;
        end if;

      end loop ;

    close monCurseur;
end
$$ language plpgsql;
select * from chercherCorrespondances('Paris','Nice','','',0,0,'',0);
