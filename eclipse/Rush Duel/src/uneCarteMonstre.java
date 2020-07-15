
public class uneCarteMonstre extends uneCarte {

	private String requirement;
	private String attribut;
	private String type;
	private boolean effet;
	private boolean Syntho;
	private int niveau;
	private int Attaque;
	private int Defense;
	
	public uneCarteMonstre(String nom, String textEffet, String genre, String ExtraType,
			String requirement, String attribut, String type, 
			int Niveau, int attaque, int defense) {
		super(nom, textEffet, genre, ExtraType);
		this.requirement = requirement;
		this.attribut = attribut;
		this.type = type;
		this.effet = true;
		this.niveau = Niveau;
		this.Syntho = false;
		this.Attaque = attaque;
		this.Defense = defense;
	}

	public String getAttribut() {
		return attribut;
	}

	public void setAttribut(String attribut) {
		this.attribut = attribut;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public int getNiveau() {
		return niveau;
	}

	public void setNiveau(int niveau) {
		this.niveau = niveau;
	}

	public int getAttaque() {
		return Attaque;
	}

	public void setAttaque(int attaque) {
		Attaque = attaque;
	}

	public int getDefense() {
		return Defense;
	}

	public void setDefense(int defense) {
		Defense = defense;
	}

	public String getRequirement() {
		return requirement;
	}

	public void setSyntho() {
		Syntho = true;
	}

	public void setEffet() {
		this.effet = false;
	}

	
}
