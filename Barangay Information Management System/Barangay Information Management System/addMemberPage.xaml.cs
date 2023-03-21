using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for addMemberPage.xaml
    /// </summary>
    public partial class addMemberPage : Window
    {
        public delegate void DataChangedEventHandler(object sender, EventArgs e);
        private ObservableCollection<Member> member;

        public event DataChangedEventHandler addMember;

        public addMemberPage()
        {
            InitializeComponent();

        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            SqlConnection connection2 = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            connection2.Open();
            SqlCommand registerAccountCMD = new SqlCommand();
            registerAccountCMD.Connection = connection2;
            registerAccountCMD.CommandText = "INSERT INTO temporaryFamilyMembers(first_name,middle_name) VALUES(@username,@password)";
            registerAccountCMD.Parameters.AddWithValue("@username", textone.Text.ToLower());
            registerAccountCMD.Parameters.AddWithValue("@password", texttwo.Password);
            SqlDataAdapter registerAccountDA = new SqlDataAdapter(registerAccountCMD);
            DataTable registerAccountDT = new DataTable();
            registerAccountDA.Fill(registerAccountDT);
            connection2.Close();

            DataChangedEventHandler handler = addMember;

            if (handler != null)
            {
                handler(this, new EventArgs());

            }


        }
    }
}
