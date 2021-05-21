<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Raport</title>
	<link rel="stylesheet" href="style.css">
  </head>
  
  <body>
	<header>
		<h1>Online Toys</h1>
	</header>
	
	<hr class="above">
	
	<nav>
		<ul>
			<li class="nav_bar"><a href="./index.php">Home</a></li>
			<li class="nav_bar"><a href="./cos.php">Coșul meu</a></li>
			<li class="nav_bar"><a href="./jucarii.php">Jucării</a></li>
			<li class="nav_bar"><a href="./boardgames.php">Boardgames</a></li>
			<li class="nav_bar"><a href="./contact.php">Contact</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container-contact"> 
			<div class="center_item">
				<h2>Raport</h2>
				<div class="report_list">
					<ol class="report_list_ol">
						<li>
							<a href="#desc"><h3>Descriere generală</h3></a>
							<ul class="report_sublist">
								<li><h4>Context</h4></li>
								<li><h4>Funcții produs</h4></li>
								<li><h4>Mediu de operare</h4></li>
							</ul>
						</li>
						<li>
							<a href="#func"><h3>Funcționalități</h3></a>
							<ul class="report_sublist">
								<li><h4>Logare/Creare cont</h4></li>
								<li><h4>Vizualizare produse</h4></li>
								<li><h4>Achiziționare produse</h4></li>
								<li><h4>Vizualizare clasament</h4></li>
								<li><h4>Abonare newsletter</h4></li>
								<li><h4>Contactare administrator</h4></li>
							</ul>
						</li>
						<li><a href="#prec"><h3>Precizări</h3></a></li>
					</ol>
					
					<hr class="between">
					
					<ol class="report_list_ol">
						<li><h3 id="desc">Descriere generală</h3>
							<ul class="report_sublist">
								<li>
									<h4>Context</h4>
									<p>Realizarea unei aplicații - proiectarea şi implementarea interfeţei Web responsive.</p>
								</li>
								<li>
									<h4>Funcții produs</h4>
									<p>Aplicația Web Online Toys gestionează colecții de jucării și jocuri de familie și oferă suport pentru activități de cumpărare
									a produselor puse la dispoziție. Aplicația administrează utilizatorii care doresc să acceseze aceste servicii ce presupun deținerea
									unui cont personal (cu excepția abonării la newsletter).</p>
								</li>
								<li>
									<h4>Mediu de operare</h4>
									<p>Aplicația a fost testată (până în momentul de față) pe web browser-ul Google Chrome, rulat pe sistemul de operare Windows 10 (64 biți).</p>
								</li>
							</ul>
						</li>
						<li><h3 id="func">Funcționalități</h3>
							<ul class="report_sublist">
								<li>
									<h4>Logare/Creare cont</h4>
									<p>Utilizatorul are posibilitatea de a-și crea un cont, necesar realizării de cumpărături și de a se loga dacă deja deține unul. Pe pagina principală a aplicației (Index),
									în zona dedicată din dreapta, se găsesc două link-uri dedicate acestor operații, care trimit către pagini unde se completează cu datele necesare câmpurile existente.</p>
								</li>
								<li>
									<h4>Vizualizare produse</h4>
									<p>Orice utilizator poate vizualiza produsele din cele două secțiuni ale magazinului (Jucării/Boardgames), fie că este logat sau nu.
									Pagina principală a aplicației (Index) afișează două zone mari în centru, fiecare cu un buton de redirectare, aferente acestor secțiuni.
									Odată ajuns pe una din aceste pagini, utilizatorul poate filtra produsele afișate după propriile opțiuni. De asemenea, orice produs poate
									fi analizat în detaliu printr-un click pe poză sau nume, acțiune care trimite către pagina corespunzătoare produsului, care conține o descriere a acestuia.</p>
								</li>
								<li>
									<h4>Achiziționare produse</h4>
									<p>Adăugarea unui produs în coșul de cumpărături presupune logarea prealabilă a utilizatorului în propriul cont. Produsele adăugate în coș pot fi găsite, apoi,
									în pagina "Coșul meu" (de unde pot fi și eliminate), care permite finalizarea achiziției prin completarea unor date necesare efectuării plății și livrării și
									confirmării comenzii.</p>
								</li>
								<li>
									<h4>Vizualizare clasament</h4>
									<p>Pe pagina principală (Index), în zona din stânga, jumătatea de sus, se află un spațiu dedicat "Articolului favorit" - produsul cu numărul cel mai mare de achiziții
									într-o perioadă de timp. Un click pe imaginea acestuia sau pe butonul "Clasament" din bara de navigare va trimite către pagina dedicată topului de 5 cele mai achiziționate produse.</p>
								</li>
								<li>
									<h4>Abonare newsletter</h4>
									<p>Tot pe pagina principală (Index), în zona din stânga, jumătatea de jos, se află un spațiu dedicat abonării la newsletterul aplicației, care se poate realiza prin introducerea
									adresei de e-mail în câmpul existent și finalizarea acțiunii prin apăsarea butonului de dedesubt.</p>
								</li>
								<li>
									<h4>Contactare administrator</h4>
									<p>Bara de navigare conține, pe fiecare pagină (pentru a facilita accesul), butonul "Contact". Acesta trimite către pagina dedicată care asigură comunicarea dintre clienți și administratori.
									Utilizatorul are la dispoziție o listă de motive pentru care solicită această comunicare, o serie de câmpuri de completat, necesare realizării comunicării și o zonă dedicată redactării mesajului.</p>
								</li>
							</ul>
						</li>
						<li><h3 id="prec">Precizări</h3>
							<ul class="report_sublist">
								<li>
									<p>În proiectarea și implementarea interfeței, implicarea membrilor de echipă a fost echilibrată. S-a colaborat și participat activ în realizarea majorității componentelor din ambele părți, însă tabelul de mai jos
									ilustrează cu exactitate componentele asupra cărora s-a concentrat mai mult unul din membrii echipei (în cazul Index, contribuția a fost egală, reprezentând etapa incipientă a colaborării).</p>
								</li>
								<li>
									<table>
										<tr>
											<th>Componentă</th>
											<th>Proiectare</th>
											<th>Implementare</th>
										 </tr>
										 <tr>
											<td>Index</td>
											<td class="both">Andrei Roșu + Anton Șfabu</td>
											<td class="both">Andrei Roșu + Anton Șfabu</td>
										 </tr>
										 <tr>
											<td>Login</td>
											<td class="andrei">Andrei Roșu</td>
											<td class="andrei">Andrei Roșu</td>
										 </tr>
										 <tr>
											<td>Creare cont</td>
											<td class="andrei">Andrei Roșu</td>
											<td class="andrei">Andrei Roșu</td>
										 </tr>
										 <tr>
											<td>Jucarii</td>
											<td class="tony">Anton Șfabu</td>
											<td class="tony">Anton Șfabu</td>
										 </tr>
										 <tr>
											<td>Jocuri</td>
											<td class="tony">Anton Șfabu</td>
											<td class="tony">Anton Șfabu</td>
										 </tr>
										 <tr>
											<td>Item</td>
											<td class="andrei">Andrei Roșu</td>
											<td class="andrei">Andrei Roșu</td>
										 </tr>
										 <tr>
											<td>Coșul meu</td>
											<td class="tony">Anton Șfabu</td>
											<td class="tony">Anton Șfabu</td>
										 </tr>
										 <tr>
											<td>Clasament</td>
											<td class="tony">Anton Șfabu</td>
											<td class="tony">Anton Șfabu</td>
										 </tr>
										 <tr>
											<td>Contact</td>
											<td class="tony">Anton Șfabu</td>
											<td class="andrei">Andrei Roșu</td>
										 </tr>
										 <tr>
											<td>Integrare pagini</td>
											<td></td>
											<td class="andrei">Andrei Roșu</td>
										 </tr>
										 <tr>
											<td>Ilustrații proprii</td>
											<td></td>
											<td class="andrei">Andrei Roșu</td>
										 </tr>
									</table>
								</li>
							</ul>
						</li>
					</ol>
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>
	
  </body>
</html>