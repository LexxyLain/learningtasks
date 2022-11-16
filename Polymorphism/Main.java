public class Main {
    public static void main(String[] args){
        Student Actions = new Student();
        Student atHome = new Home();
        Student atSchool = new School();
        Actions.execute();
        atHome.execute();
        Actions.execute();
        atSchool.execute();

    }
}
