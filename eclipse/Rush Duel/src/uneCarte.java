
public class uneCarte {

	private String nom;
	private String texteEffet;
	private String genre;
	private String Extra;
	private boolean verso;
	
	public uneCarte(String nom, String textEffet, String genre, String Extra) {
		this.nom = nom;
		this.texteEffet = textEffet;
		this.genre = genre;
		this.Extra = Extra;
		this.verso = false;
	}

	public String getExtra() {
		return Extra;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public String getTexteEffet() {
		return texteEffet;
	}

	public void setTexteEffet(String texteEffet) {
		this.texteEffet = texteEffet;
	}

	public String getGenre() {
		return genre;
	}

	public void setGenre(String genre) {
		this.genre = genre;
	}

	public void setVerso() {
		this.verso = true;
	}
}
