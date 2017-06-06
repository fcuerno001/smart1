SELECT claves.id_clave, clientes.cliente,claves.hostname,claves.ip_address, 
claves.usuario_host, claves.pass_host,claves.fecha_registro,claves.fecha_modif,
claves.mantto_admins_id_admin 
FROM coex.mantto_claves as claves
left join coex.mantto_clientes as clientes
on claves.mantto_clientes_id_cliente=clientes.id_Cliente;